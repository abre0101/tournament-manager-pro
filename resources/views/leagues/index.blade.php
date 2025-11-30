@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Leagues</h1>
        @if(auth()->user()->canManageLeagues())
            <a href="{{ route('leagues.create') }}" class="btn btn-primary">+ Add New League</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($leagues->isEmpty())
        <div class="alert alert-info">No leagues found. Click "Add New League" to get started.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Season</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leagues as $league)
                        <tr>
                            <td>{{ $league->id }}</td>
                            <td>{{ $league->name }}</td>
                            <td>{{ $league->season ?? 'N/A' }}</td>
                            <td>{{ $league->start_date ? $league->start_date->format('M d, Y') : 'N/A' }}</td>
                            <td>{{ $league->end_date ? $league->end_date->format('M d, Y') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('leagues.show', $league) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('leagues.edit', $league) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('leagues.destroy', $league) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this league?')">Delete</button>
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
