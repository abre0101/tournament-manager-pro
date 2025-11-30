<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700|Poppins:400,500,600,700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-color: #1a472a;
            --secondary-color: #2ecc71;
            --accent-color: #f39c12;
            --dark-bg: #0a1612;
            --light-bg: rgba(255, 255, 255, 0.95);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a1612 0%, #1a472a 100%);
            background-attachment: fixed;
            min-height: 100vh;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="48" fill="none" stroke="rgba(46,204,113,0.03)" stroke-width="0.5"/><path d="M50 2 L50 98 M2 50 L98 50" stroke="rgba(46,204,113,0.03)" stroke-width="0.5"/></svg>');
            background-size: 100px 100px;
            opacity: 0.3;
            z-index: 0;
            pointer-events: none;
        }
        
        #app {
            position: relative;
            z-index: 1;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0d2818 100%) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            border-bottom: 3px solid var(--secondary-color);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #fff !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-brand::before {
            content: '⚽';
            font-size: 1.8rem;
            animation: spin 3s linear infinite;
        }
        
        @keyframes spin {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(180deg); }
        }
        
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 1rem !important;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
            transform: translateY(-2px);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--secondary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 80%;
        }
        
        .dropdown-menu {
            background: var(--primary-color);
            border: 1px solid var(--secondary-color);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        
        .dropdown-item {
            color: #fff;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
        }
        
        main {
            background: var(--light-bg);
            min-height: calc(100vh - 80px);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 50px rgba(0,0,0,0.2);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            overflow: hidden;
            transition: all 0.3s ease;
            background: #fff;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.18);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0d2818 100%);
            color: #fff;
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            border-bottom: 3px solid var(--secondary-color);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #27ae60 100%);
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(46,204,113,0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46,204,113,0.4);
            background: linear-gradient(135deg, #27ae60 0%, var(--secondary-color) 100%);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--accent-color) 0%, #e67e22 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(243,156,18,0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border: none;
            transition: all 0.3s ease;
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0d2818 100%);
            color: #fff;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(46,204,113,0.05);
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(46,204,113,0.1);
            transform: scale(1.01);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border-left: 4px solid #28a745;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(46,204,113,0.25);
        }
        
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        /* Dashboard Cards */
        .bg-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
        }
        
        .bg-success {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #27ae60 100%) !important;
        }
        
        .bg-info {
            background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%) !important;
        }
        
        .bg-warning {
            background: linear-gradient(135deg, var(--accent-color) 0%, #e67e22 100%) !important;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .container > * {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('teams.index') }}">Teams</a>
                            </li>
                            @if(auth()->user()->canManageTeams())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('players.index') }}">Players</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('games.index') }}">Games</a>
                            </li>
                            @if(auth()->user()->canManageLeagues())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('leagues.index') }}">Leagues</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                    <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item-text">
                                        <strong>Role:</strong> {{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>