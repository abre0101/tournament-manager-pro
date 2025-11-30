@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container">
    <h1>Edit Game</h1>

    <form action="{{ route('games.update', $game->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="home_team_id">Home Team</label>
            <select name="home_team_id" id="home_team_id" class="form-control" required>
                <option value="" disabled>Select Home Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" 
                        {{ $team->id == $game->home_team_id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="away_team_id">Away Team</label>
            <select name="away_team_id" id="away_team_id" class="form-control" required>
                <option value="" disabled>Select Away Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" 
                        {{ $team->id == $game->away_team_id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="match_date">Match Date</label>
            <input type="date" name="match_date" id="match_date" class="form-control" value="{{ $game->match_date->toDateString() }}" required>
        </div>

        <div class="form-group">
            <label for="match_time">Match Time</label>
            <input type="time" name="match_time" id="match_time" class="form-control" value="{{ $game->match_time->format('H:i') }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $game->location }}" required>
        </div>

        <div class="form-group">
            <label for="score1">Home Team Score</label>
            <input type="number" name="score1" id="score1" class="form-control" value="{{ $game->score1 }}" min="0">
        </div>

        <div class="form-group">
            <label for="score2">Away Team Score</label>
            <input type="number" name="score2" id="score2" class="form-control" value="{{ $game->score2 }}" min="0">
        </div>

        <button type="submit" class="btn btn-primary">Update Game</button>
    </form>
</div>

@endsection
