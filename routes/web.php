<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);
Route::post('/tasks/update-order', [TaskController::class, 'reorder'])->name('tasks.update-order');

Route::resource('projects', ProjectController::class);