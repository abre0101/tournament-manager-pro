<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin,organizer,team_manager')->except(['index', 'show']);
    }

    public function index()
    {
        $user = auth()->user();
        
        // Team managers see only their team's players
        if ($user->isTeamManager()) {
            $teamIds = $user->teams->pluck('id');
            $players = Player::with('team')->whereIn('team_id', $teamIds)->get();
        } else {
            $players = Player::with('team')->get();
        }
        
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $user = auth()->user();
        
        // Team managers can only add players to their teams
        if ($user->isTeamManager()) {
            $teams = $user->teams()->where('status', 'approved')->get();
        } else {
            $teams = Team::where('status', 'approved')->get();
        }
        
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'position' => 'nullable|string|max:100',
            'jersey_number' => 'nullable|integer|min:1|max:99',
            'age' => 'required|integer|min:15|max:50',
            'nationality' => 'required|string|max:100',
        ]);

        Player::create($request->all());

        return redirect()->route('players.index')->with('success', 'Player created successfully!');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $user = auth()->user();
        
        // Check if team manager can edit this player
        if ($user->isTeamManager()) {
            if (!$user->teams->contains($player->team_id)) {
                abort(403, 'You can only edit players from your own teams.');
            }
            $teams = $user->teams()->where('status', 'approved')->get();
        } else {
            $teams = Team::where('status', 'approved')->get();
        }
        
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'position' => 'nullable|string|max:100',
            'jersey_number' => 'nullable|integer|min:1|max:99',
            'age' => 'required|integer|min:15|max:50',
            'nationality' => 'required|string|max:100',
        ]);

        $player->update($request->all());

        return redirect()->route('players.index')->with('success', 'Player updated successfully!');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
    }
}
