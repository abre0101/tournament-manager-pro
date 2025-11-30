@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Players</h1>
        @if(auth()->user()->canManageTeams())
            <a href="{{ route('players.create') }}" class="btn btn-primary">+ Add New Player</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(auth()->user()->isTeamManager())
        <div class="alert alert-info">
            <strong>Note:</strong> You can only manage players from your own teams.
        </div>
    @endif

    @if($players->isEmpty())
        <div class="alert alert-info">No players found. Click "Add New Player" to get started.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Team</th>
                        <th>Position</th>
                        <th>Jersey #</th>
                        <th>Age</th>
                        <th>Nationality</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->id }}</td>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->team->name ?? 'N/A' }}</td>
                            <td>{{ $player->position ?? 'N/A' }}</td>
                            <td>{{ $player->jersey_number ?? 'N/A' }}</td>
                            <td>{{ $player->age ?? 'N/A' }}</td>
                            <td>{{ $player->nationality ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('players.show', $player) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('players.edit', $player) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('players.destroy', $player) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this player?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
