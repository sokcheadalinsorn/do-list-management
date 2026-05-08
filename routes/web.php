<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\SettingController;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// No middleware - open access for now
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/completed', [CompletedController::class, 'index'])->name('completed');

Route::get('/setting', [SettingController::class, 'index'])->name('setting');

