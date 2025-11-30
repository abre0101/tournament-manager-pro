@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>League Details</span>
                    <div>
                        <a href="{{ route('leagues.edit', $league) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('leagues.index') }}" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="30%">League Name:</th>
                                <td>{{ $league->name }}</td>
                            </tr>
                            <tr>
                                <th>Season:</th>
                                <td>{{ $league->season ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Start Date:</th>
                                <td>{{ $league->start_date ? $league->start_date->format('M d, Y') : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>End Date:</th>
                                <td>{{ $league->end_date ? $league->end_date->format('M d, Y') : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $league->created_at->format('M d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td>{{ $league->updated_at->format('M d, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
