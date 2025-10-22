@extends('layouts.app')

@section('content')
<style>
body {
    font-family: var(--font-football), sans-serif;
    background-color: var(--bg-color);
    color: #2C3E50;
    margin: 0;
    padding: 0;
}

/* Header styling */
header {
    background-color: var(--primary-color);
    color: #fff;
    padding: 1rem 0;
    text-align: center;
}

header h1 {
    font-size: 2.5rem;
    font-weight: 700;
}

/* Tournament Table */
.table {
    width: 100%;
    margin-top: 2rem;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: var(--card-shadow);
}

.table th, .table td {
    padding: 1rem;
    text-align: center;
    vertical-align: middle;
    border: 1px solid #dee2e6;
    font-weight: 600;
}

.table thead {
    background-color: var(--primary-color);
    color: #fff;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

.table td img {
    border-radius: 5px;
    max-height: 60px;
    width: auto;
}

/* Buttons */
.btn {
    font-size: 0.9rem;
    padding: 0.6rem 1.2rem;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.btn-primary {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
    color: #fff;
}

.btn-primary:hover {
    background-color: #c0392b;
    border-color: #c0392b;
}

.btn-warning {
    background-color: var(--tertiary-color);
    border-color: var(--tertiary-color);
    color: #fff;
}

.btn-warning:hover {
    background-color: #e67e22;
    border-color: #e67e22;
}

.btn-danger {
    background-color: #e74c3c;
    border: none;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c0392b;
    border-color: #c0392b;
}

/* Alert Styles */
.alert-info {
    background-color: #d9edf7;
    color: #31708f;
    border-color: #bce8f1;
    padding: 1rem;
    border-radius: 6px;
    font-weight: 500;
}

/* Cards (Game Info, Tournament Info) */
.card {
    background-color: var(--card-bg);
    border-radius: 8px;
    padding: 2rem;
    box-shadow: var(--card-shadow);
    margin-top: 1.5rem;
}

.card-header {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.card-body {
    font-size: 1rem;
    line-height: 1.6;
}

/* Table actions (edit, delete) */
.table-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.table-actions .btn {
    padding: 0.4rem 1rem;
}

/* Responsive Styling */
@media (max-width: 768px) {
    .table th, .table td {
        padding: 0.6rem;
    }
    
    .btn {
        font-size: 0.8rem;
        padding: 0.5rem 1rem;
    }
}

@media (max-width: 576px) {
    header h1 {
        font-size: 1.8rem;
    }

    .container {
        padding: 1rem;
    }
}
</style>
<div class="container">
    <h1>Games (Matches) List</h1>
    
    <!-- Check if there are no games in the database -->
    @if($games->isEmpty())
        <p>No games available.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th>Match Date</th>
                    <th>Match Time</th>
                    <th>Score</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->team1->name }}</td>
                        <td>{{ $game->team2->name }}</td>
                        <td>{{ $game->match_date->format('Y-m-d') }}</td>
                        <td>{{ $game->match_time }}</td>
                        <td>
                            @if($game->score1 !== null && $game->score2 !== null)
                                {{ $game->score1 }} - {{ $game->score2 }}
                            @else
                                Not yet finished
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form for deleting a game -->
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this game?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
