@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Game</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to create a new game -->
    <form action="{{ route('games.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="team1_id">Team 1 (Home)</label>
            <select name="team1_id" id="team1_id" class="form-control" required>
                <option value="" disabled selected>Select Team 1</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="team2_id">Team 2 (Away)</label>
            <select name="team2_id" id="team2_id" class="form-control" required>
                <option value="" disabled selected>Select Team 2</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="match_date">Match Date</label>
            <input type="date" name="match_date" id="match_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="match_time">Match Time</label>
            <input type="time" name="match_time" id="match_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="score1">Score (Team 1)</label>
            <input type="number" name="score1" id="score1" class="form-control" placeholder="Optional">
        </div>

        <div class="form-group">
            <label for="score2">Score (Team 2)</label>
            <input type="number" name="score2" id="score2" class="form-control" placeholder="Optional">
        </div>

        <button type="submit" class="btn btn-primary">Create Game</button>
    </form>
</div>
@endsection
