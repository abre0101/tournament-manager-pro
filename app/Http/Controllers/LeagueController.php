<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index()
    {
        $leagues = League::all(); // Get all leagues
        return view('leagues.index', compact('leagues'));
    }

    public function create()
    {
        return view('leagues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        League::create($request->all()); // Mass assignment

        return redirect()->route('leagues.index')->with('success', 'League created successfully.');
    }

    public function edit(League $league)
    {
        return view('leagues.edit', compact('league'));
    }

    public function update(Request $request, League $league)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $league->update($request->all()); // Update league data

        return redirect()->route('leagues.index')->with('success', 'League updated successfully.');
    }

    public function destroy(League $league)
    {
        $league->delete(); // Delete league

        return redirect()->route('leagues.index')->with('success', 'League deleted successfully.');
    }
}