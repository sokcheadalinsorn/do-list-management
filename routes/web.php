<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\SettingController;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'register']);

// No middleware - open access for now

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/completed', [CompletedController::class, 'index'])->name('completed');

Route::get('/setting', [SettingController::class, 'index'])->name('setting');

