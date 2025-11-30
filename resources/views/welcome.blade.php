<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Tournament Management</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,600,700,800" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a1612 0%, #1a472a 50%, #0d2818 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated Football Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(46,204,113,0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(243,156,18,0.1) 0%, transparent 50%),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle cx="100" cy="100" r="95" fill="none" stroke="rgba(46,204,113,0.05)" stroke-width="2"/><path d="M100 5 L100 195 M5 100 L195 100 M30 30 L170 170 M170 30 L30 170" stroke="rgba(46,204,113,0.03)" stroke-width="1"/></svg>');
            background-size: cover, cover, 150px 150px;
            animation: moveBackground 20s ease-in-out infinite;
            z-index: 0;
        }
        
        @keyframes moveBackground {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(20px, 20px); }
        }
        
        .hero-section {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .hero-content {
            text-align: center;
            color: #fff;
            max-width: 900px;
            animation: fadeInUp 1s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero-icon {
            font-size: 6rem;
            margin-bottom: 1rem;
            animation: bounce 2s ease-in-out infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #fff 0%, #2ecc71 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 20px rgba(46,204,113,0.3);
        }
        
        .subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: rgba(255,255,255,0.9);
            font-weight: 600;
        }
        
        .description {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
        }
        
        .btn-group-custom {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-custom {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: #fff;
            border: 2px solid transparent;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(46,204,113,0.4);
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
        }
        
        .btn-outline-custom {
            background: transparent;
            color: #fff;
            border: 2px solid #2ecc71;
        }
        
        .btn-outline-custom:hover {
            background: #2ecc71;
            color: #0a1612;
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(46,204,113,0.4);
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
            padding: 0 1rem;
        }
        
        .feature-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            border: 1px solid rgba(46,204,113,0.3);
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease-out;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255,255,255,0.15);
            box-shadow: 0 15px 40px rgba(46,204,113,0.3);
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #2ecc71;
        }
        
        .feature-desc {
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1.2rem;
            }
            
            .description {
                font-size: 1rem;
            }
            
            .btn-custom {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-icon">⚽🏆</div>
            <h1>Tournament Manager</h1>
            <p class="subtitle">Your Complete Sports Management Solution</p>
            <p class="description">
                Manage tournaments, teams, players, and games all in one powerful platform. 
                Track scores, schedule matches, and organize your entire sports league with ease.
            </p>
            
            <div class="btn-group-custom">
                @auth
                    <a href="{{ route('home') }}" class="btn-custom btn-primary-custom">
                        🏠 Go to Dashboard
                    </a>
                    <a href="{{ route('teams.index') }}" class="btn-custom btn-outline-custom">
                        👥 View Teams
                    </a>
                    <a href="{{ route('games.index') }}" class="btn-custom btn-outline-custom">
                        ⚽ View Games
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-custom btn-primary-custom">
                        🔐 Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-custom btn-outline-custom">
                        📝 Register
                    </a>
                @endauth
            </div>
            
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <div class="feature-title">Team Management</div>
                    <div class="feature-desc">Create and manage teams with logos, coaches, and player rosters</div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">⚽</div>
                    <div class="feature-title">Game Scheduling</div>
                    <div class="feature-desc">Schedule matches, track scores, and manage tournament fixtures</div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🏃</div>
                    <div class="feature-title">Player Tracking</div>
                    <div class="feature-desc">Maintain player profiles with positions and jersey numbers</div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <div class="feature-title">League Organization</div>
                    <div class="feature-desc">Organize multiple leagues and track seasonal tournaments</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>