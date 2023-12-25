<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name("home")->middleware('auth');

Route::get('/task/new', [TaskController::class, 'create'])->name('task.create')->middleware('auth');

Route::post('/create/new_task', [TaskController::class, 'create_task'])->name('create.task')->middleware('auth');

Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit')->middleware('auth');

Route::post('/task/save/edit', [TaskController::class, 'save_edit'])->name('task.save_edit')->middleware();

Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete')->middleware('auth');


Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register/user', [AuthController::class, 'register_user'])->name('register.user');

Route::post('/login/user', [AuthController::class, 'login_user'])->name('login.user');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout.user');

Route::post('/checked', [TaskController::class, 'checkerBox'])->name('checker.box')->middleware('auth');
