<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Display a list of all games
    public function index()
    {
        $games = Game::with(['team1', 'team2'])->get(); // Eager load teams
        return view('games.index', compact('games'));
    }

    // Show the form for creating a new game
    public function create()
    {
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    // Store a newly created game in the database
    public function store(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id|different:team2_id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'match_time' => 'required|date_format:H:i',
            'score1' => 'nullable|integer',
            'score2' => 'nullable|integer',
        ]);

        Game::create([
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'score1' => $request->score1,
            'score2' => $request->score2,
        ]);

        return redirect()->route('games.index')->with('success', 'Game created successfully!');
    }

    // Show the form for editing an existing game
    public function edit(Game $game)
    {
        $teams = Team::all();
        return view('games.edit', compact('game', 'teams'));
    }

    // Update the specified game
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id|different:team2_id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'match_time' => 'required|date_format:H:i',
            'score1' => 'nullable|integer',
            'score2' => 'nullable|integer',
        ]);

        $game->update([
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'score1' => $request->score1,
            'score2' => $request->score2,
        ]);

        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    // Delete a game
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    }
}
