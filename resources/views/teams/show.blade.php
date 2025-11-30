@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Team Details</span>
                    <div>
                        <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('teams.index') }}" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    @if($team->logo)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }} Logo" style="max-width: 200px;">
                        </div>
                    @endif

                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Team Name:</th>
                                <td>{{ $team->name }}</td>
                            </tr>
                            <tr>
                                <th>Coach Name:</th>
                                <td>{{ $team->coach_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Group:</th>
                                <td>{{ $team->group ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $team->created_at->format('M d, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5 class="mt-4">Players</h5>
                    @if($team->players->count() > 0)
                        <ul class="list-group">
                            @foreach($team->players as $player)
                                <li class="list-group-item">{{ $player->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No players assigned to this team yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
