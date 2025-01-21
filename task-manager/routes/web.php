<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

//Task manager
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // List all tasks
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Show form to create a task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Save a new task
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Display a specific task
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show form to edit a task
Route::post('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update'); // Update a task
Route::post('/tasks/{task}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete a task