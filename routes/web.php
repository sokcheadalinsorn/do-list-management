<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/login', [ AuthController::class, 'store'])->name('login.store');

// No middleware - open access for now
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/completed', [CompletedController::class, 'index'])->name('completed');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');