<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Application!</h1>
        <p>This is the welcome page of our Laravel application.</p>
        <a href="{{ route('games.index') }}" class="btn btn-primary">View Games</a> <!-- Example link to games -->
    </div>
</body>
</html>