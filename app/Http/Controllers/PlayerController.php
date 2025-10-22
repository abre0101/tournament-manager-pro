<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team; // Import Team model for team selection
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->get(); // Eager load team data
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::all(); // Get all teams for the dropdown
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'position' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'nationality' => 'required|string|max:255',
        ]);

        Player::create($request->all()); // Mass assignment

        return redirect()->route('players.index')->with('success', 'Player created successfully.');
    }

    public function edit(Player $player)
    {
        $teams = Team::all(); // Get all teams for the dropdown
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'position' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'nationality' => 'required|string|max:255',
        ]);

        $player->update($request->all()); // Update player data

        return redirect()->route('players.index')->with('success', 'Player updated successfully.');
    }

    public function destroy(Player $player)
    {
        $player->delete(); // Delete player

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }
}