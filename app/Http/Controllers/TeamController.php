<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin,organizer,team_manager')->except(['index', 'show']);
    }

    public function index()
    {
        $user = auth()->user();
        
        // Team managers see only their teams
        if ($user->isTeamManager()) {
            $teams = $user->teams;
        } else {
            // Admins and organizers see all teams
            $teams = Team::with('user')->get();
        }
        
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'coach_name' => 'nullable|string|max:255',
            'group' => 'nullable|string|max:10',
        ]);

        $data = $request->only(['name', 'coach_name', 'group']);
        $data['user_id'] = auth()->id();
        
        // Team managers need approval, admins/organizers auto-approved
        $data['status'] = auth()->user()->isTeamManager() ? 'pending' : 'approved';

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Team::create($data);

        $message = auth()->user()->isTeamManager() 
            ? 'Team created successfully. Waiting for approval.' 
            : 'Team created successfully.';

        return redirect()->route('teams.index')->with('success', $message);
    }

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        // Check if user can edit this team
        if (!auth()->user()->isSuperAdmin() && !auth()->user()->isOrganizer()) {
            if ($team->user_id !== auth()->id()) {
                abort(403, 'You can only edit your own teams.');
            }
        }
        
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'coach_name' => 'nullable|string|max:255',
            'group' => 'nullable|string|max:10',
        ]);

        $data = $request->only(['name', 'coach_name', 'group']);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($team->logo && Storage::disk('public')->exists($team->logo)) {
                Storage::disk('public')->delete($team->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $team->update($data);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        // Check if user can delete this team
        if (!auth()->user()->isSuperAdmin() && !auth()->user()->isOrganizer()) {
            if ($team->user_id !== auth()->id()) {
                abort(403, 'You can only delete your own teams.');
            }
        }

        // Delete logo if exists
        if ($team->logo && Storage::disk('public')->exists($team->logo)) {
            Storage::disk('public')->delete($team->logo);
        }

        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }

    // Approve team (organizers only)
    public function approve(Team $team)
    {
        if (!auth()->user()->canApproveTeams()) {
            abort(403, 'Unauthorized action.');
        }

        $team->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Team approved successfully.');
    }

    // Reject team (organizers only)
    public function reject(Team $team)
    {
        if (!auth()->user()->canApproveTeams()) {
            abort(403, 'Unauthorized action.');
        }

        $team->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Team rejected.');
    }
}
