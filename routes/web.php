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

// login logout and register
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/completed', [CompletedController::class, 'index'])->name('completed');


Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');