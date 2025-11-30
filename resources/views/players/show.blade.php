@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Player Details</span>
                    <div>
                        <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('players.index') }}" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="30%">Player Name:</th>
                                <td>{{ $player->name }}</td>
                            </tr>
                            <tr>
                                <th>Team:</th>
                                <td>
                                    @if($player->team)
                                        <a href="{{ route('teams.show', $player->team) }}">{{ $player->team->name }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Position:</th>
                                <td>{{ $player->position ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Jersey Number:</th>
                                <td>{{ $player->jersey_number ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td>{{ $player->age ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Nationality:</th>
                                <td>{{ $player->nationality ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $player->created_at->format('M d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td>{{ $player->updated_at->format('M d, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
