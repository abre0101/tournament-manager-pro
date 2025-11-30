@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p class="text-muted">
                        You are logged in as: <strong class="text-primary">{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</strong>
                    </p>
                    
                    @if(Auth::user()->isTeamManager())
                        <div class="alert alert-info">
                            <strong>Your Teams:</strong> You can manage {{ Auth::user()->teams->count() }} team(s).
                        </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5>Teams</h5>
                                    <p class="display-6">{{ \App\Models\Team::count() }}</p>
                                    <a href="{{ route('teams.index') }}" class="btn btn-primary btn-sm">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5>Players</h5>
                                    <p class="display-6">{{ \App\Models\Player::count() }}</p>
                                    <a href="{{ route('players.index') }}" class="btn btn-primary btn-sm">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5>Games</h5>
                                    <p class="display-6">{{ \App\Models\Game::count() }}</p>
                                    <a href="{{ route('games.index') }}" class="btn btn-primary btn-sm">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5>Leagues</h5>
                                    <p class="display-6">{{ \App\Models\League::count() }}</p>
                                    <a href="{{ route('leagues.index') }}" class="btn btn-primary btn-sm">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Quick Actions</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            @if(Auth::user()->canManageTeams())
                                <a href="{{ route('teams.create') }}" class="btn btn-outline-primary">+ Add Team</a>
                            @endif
                            @if(Auth::user()->canManageTeams())
                                <a href="{{ route('players.create') }}" class="btn btn-outline-success">+ Add Player</a>
                            @endif
                            @if(Auth::user()->canManageGames())
                                <a href="{{ route('games.create') }}" class="btn btn-outline-info">+ Schedule Game</a>
                            @endif
                            @if(Auth::user()->canManageLeagues())
                                <a href="{{ route('leagues.create') }}" class="btn btn-outline-warning">+ Create League</a>
                            @endif
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">View Full Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
