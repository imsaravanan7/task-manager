<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/post', [AuthController::class, 'register'])->name('register.post');

// Protecting routes with auth middleware
Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    })->name('dashboard');

    // Task management routes
    Route::resource('tasks', TaskController::class);
});

// Default welcome route
Route::get('/', function () {
    return view('auth.register');
});

//Task manager
Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // List all tasks
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Show form to create a task
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Save a new task
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Display a specific task
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show form to edit a task
    Route::post('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update'); // Update a task
    Route::post('/tasks/{task}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete a task
});