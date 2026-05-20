<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\SettingController;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Route;
use PHPUnit\Util\Test;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/register', [AuthController::class, 'store'])->name('regiter.store');

// No middleware - open access for now

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/completed', [CompletedController::class, 'index'])->name('completed');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks', [TaskController::class, 'showAll'])->name('tasks.showAll');
Route::resource('tasks', TaskController::class);
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');




Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::resource('tasks', TaskController::class);
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/completed', [CompletedController::class, 'index'])->name('completed');


Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
