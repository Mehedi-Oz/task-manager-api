<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUserController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', [TaskController::class, 'index'])->name('index');


// User Authentication Routes - TaskUserController
Route::get('/login', [TaskUserController::class, 'handleLogin'])->name('user.handleLogin');
Route::get('/register', [TaskUserController::class, 'handleRegister'])->name('user.handleRegister');
Route::post('/store', [TaskUserController::class, 'store'])->name('user.store');
Route::post('/verify', [TaskUserController::class, 'verify'])->name('user.verify');



// Task Management Routes - TaskController
Route::get('/tasks/trash', [TaskController::class, 'trash'])->name('tasks.trash');
Route::get('/tasks/restore/{id}', [TaskController::class, 'restore'])->name('tasks.restore');
Route::delete('/tasks/trash/{id}', [TaskController::class, 'permanentDestroy'])->name('tasks.permanentDestroy');
Route::resource('tasks', TaskController::class);
