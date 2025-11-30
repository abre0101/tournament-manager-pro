@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .container {
        background-color: #ffffff;
        padding: 2rem;
        margin-top: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    h1 {
        color: #2c3e50;
        font-size: 2rem;
        font-weight: 600;
    }

    .btn {
        font-size: 0.9rem;
        padding: 0.45rem 1rem;
        border-radius: 6px;
        transition: all 0.2s ease-in-out;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004ca3;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
        color: #212529;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    .table {
        width: 100%;
        margin-top: 1rem;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #dee2e6;
    }

    .table thead {
        background-color: #343a40;
        color: white;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
    }

    .alert-info {
        background-color: #e9f7fd;
        border: 1px solid #b6e0f9;
        color: #0c5460;
        padding: 1rem;
        border-radius: 6px;
    }

    img {
        border-radius: 4px;
        max-height: 50px;
    }
</style>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Teams</h1>
        @if(auth()->user()->canManageTeams())
            <a href="{{ route('teams.create') }}" class="btn btn-primary">+ Add New Team</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(auth()->user()->isTeamManager())
        <div class="alert alert-info">
            <strong>Note:</strong> You can only manage your own teams.
        </div>
    @endif

    @if ($teams->isEmpty())
        <div class="alert alert-info">
            No teams found. Click "Add New Team" to get started.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Coach</th>
                    @if(!auth()->user()->isTeamManager())
                        <th>Manager</th>
                    @endif
                    <th>Group</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td>
                            @if ($team->logo)
                                <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }} Logo" width="50" style="border-radius: 4px;">
                            @else
                                <span class="text-muted">No Logo</span>
                            @endif
                        </td>
                        <td><strong>{{ $team->name }}</strong></td>
                        <td>{{ $team->coach_name }}</td>
                        @if(!auth()->user()->isTeamManager())
                            <td>{{ $team->user->name ?? 'N/A' }}</td>
                        @endif
                        <td>{{ $team->group ?? 'N/A' }}</td>
                        <td>
                            @if($team->status === 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($team->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->canApproveTeams() && $team->status === 'pending')
                                <form action="{{ route('teams.approve', $team) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">✓ Approve</button>
                                </form>
                                <form action="{{ route('teams.reject', $team) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">✗ Reject</button>
                                </form>
                            @endif
                            
                            @if(auth()->user()->isSuperAdmin() || auth()->user()->isOrganizer() || $team->user_id === auth()->id())
                                <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this team?')">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
