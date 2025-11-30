@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Game Details</span>
                    <div>
                        <a href="{{ route('games.edit', $game) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('games.index') }}" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3>{{ $game->team1->name }} vs {{ $game->team2->name }}</h3>
                        @if($game->score1 !== null && $game->score2 !== null)
                            <h1 class="display-3">{{ $game->score1 }} - {{ $game->score2 }}</h1>
                        @else
                            <span class="badge bg-secondary fs-5">Not Played Yet</span>
                        @endif
                    </div>

                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="30%">Home Team:</th>
                                <td><a href="{{ route('teams.show', $game->team1) }}">{{ $game->team1->name }}</a></td>
                            </tr>
                            <tr>
                                <th>Away Team:</th>
                                <td><a href="{{ route('teams.show', $game->team2) }}">{{ $game->team2->name }}</a></td>
                            </tr>
                            <tr>
                                <th>Match Date:</th>
                                <td>{{ \Carbon\Carbon::parse($game->match_date)->format('l, F d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Match Time:</th>
                                <td>{{ $game->match_time }}</td>
                            </tr>
                            <tr>
                                <th>Score:</th>
                                <td>
                                    @if($game->score1 !== null && $game->score2 !== null)
                                        {{ $game->score1 }} - {{ $game->score2 }}
                                    @else
                                        Not played yet
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $game->created_at->format('M d, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
