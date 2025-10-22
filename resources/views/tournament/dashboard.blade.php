@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Football Tournament Dashboard</h1>
    <p>Manage your teams and matches from here.</p>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">View Teams</a>
    <a href="{{ route('matches.index') }}" class="btn btn-secondary">View Matches</a>
</div>
@endsection