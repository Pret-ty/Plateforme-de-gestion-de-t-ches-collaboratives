<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::resource('projects', ProjectController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

Route::resource('tasks', TaskController::class);

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('users.index');
            Route::get('/users/edit/{user}', 'edit')->name('users.edit');
            Route::post('/users/edit/{user}', 'update')->name('users.update');
        });
    });


    Route::prefix('task')
    ->controller('TaskController::class')
    ->name('task')
    ->group(function () {

        Route::get('/', 'index')->name('tasks.index');
        Route::get('/assigned', 'MyTask')->name('MyTask');
    });



