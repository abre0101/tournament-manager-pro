<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Ensure Auth is imported
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MatchController;


// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes(); // This will register all the default authentication routes
Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
// Registration routes (optional, since Auth::routes() includes these)
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Team management routes
Route::resource('teams', TeamController::class);

// Game management routes
Route::resource('games', GameController::class);

// Dashboard route
Route::get('/tournament/dashboard', function () {
    return view('tournament.dashboard');
})->name('tournament.dashboard');