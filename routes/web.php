<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\LeagueController;

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Team management routes
    Route::resource('teams', TeamController::class);
    Route::post('/teams/{team}/approve', [TeamController::class, 'approve'])->name('teams.approve');
    Route::post('/teams/{team}/reject', [TeamController::class, 'reject'])->name('teams.reject');
    
    // Game management routes
    Route::resource('games', GameController::class);
    
    // Player management routes
    Route::resource('players', PlayerController::class);
    
    // League management routes
    Route::resource('leagues', LeagueController::class);
    
    // Match routes
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    
    // Dashboard routes
    Route::get('/dashboard', function () {
        return view('tournament.dashboard');
    })->name('dashboard');
    
    Route::get('/tournament/dashboard', function () {
        return view('tournament.dashboard');
    })->name('tournament.dashboard');
});