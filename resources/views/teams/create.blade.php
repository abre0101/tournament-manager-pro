@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container">
    <h1>Add New Team</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Team Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Team Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="coach_name" class="form-label">Coach Name</label>
            <input type="text" name="coach_name" class="form-control" value="{{ old('coach_name') }}">
        </div>

        <div class="mb-3">
            <label for="group" class="form-label">Group</label>
            <select name="group" class="form-select">
                <option value="">Select Group</option>
                <option value="A" {{ old('group') == 'A' ? 'selected' : '' }}>Group A</option>
                <option value="B" {{ old('group') == 'B' ? 'selected' : '' }}>Group B</option>
                <option value="C" {{ old('group') == 'C' ? 'selected' : '' }}>Group C</option>
                <option value="D" {{ old('group') == 'D' ? 'selected' : '' }}>Group D</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Team</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
