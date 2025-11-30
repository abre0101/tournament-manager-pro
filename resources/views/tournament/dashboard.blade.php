@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tournament Dashboard</h1>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Teams</h5>
                    <p class="card-text display-4">{{ \App\Models\Team::count() }}</p>
                    <a href="{{ route('teams.index') }}" class="btn btn-light btn-sm">View Teams</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Players</h5>
                    <p class="card-text display-4">{{ \App\Models\Player::count() }}</p>
                    <a href="{{ route('players.index') }}" class="btn btn-light btn-sm">View Players</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Games</h5>
                    <p class="card-text display-4">{{ \App\Models\Game::count() }}</p>
                    <a href="{{ route('games.index') }}" class="btn btn-light btn-sm">View Games</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Games</h5>
                    <p class="card-text display-4">{{ \App\Models\Game::where('match_date', '>=', now())->count() }}</p>
                    <a href="{{ route('games.create') }}" class="btn btn-light btn-sm">Schedule Game</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Games</h5>
                </div>
                <div class="card-body">
                    @php
                        $recentGames = \App\Models\Game::with(['team1', 'team2'])
                            ->orderBy('match_date', 'desc')
                            ->take(5)
                            ->get();
                    @endphp

                    @if($recentGames->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Team 1</th>
                                    <th>Team 2</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentGames as $game)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($game->match_date)->format('M d, Y') }}</td>
                                        <td>{{ $game->team1->name }}</td>
                                        <td>{{ $game->team2->name }}</td>
                                        <td>
                                            @if($game->score1 !== null && $game->score2 !== null)
                                                {{ $game->score1 }} - {{ $game->score2 }}
                                            @else
                                                <span class="badge bg-secondary">Not played</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">No games scheduled yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
