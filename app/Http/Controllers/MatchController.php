<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id|different:team2_id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'match_time' => 'required|date_format:H:i',
            'score1' => 'nullable|integer|min:0',
            'score2' => 'nullable|integer|min:0',
        ]);

        Game::create([
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'score1' => $request->score1,
            'score2' => $request->score2,
        ]);

        return redirect()->route('games.index')->with('success', 'Match created successfully!');
    }
}
