<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application Title</title>
    
    <!-- Include Vite assets -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Main content section -->
        @yield('content')
    </div>

    <!-- Optional: Include any additional scripts here -->
</body>
</html>