<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//posts

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete')->middleware('auth');
//users

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/registerForm', [UserController::class, 'create'])->name('users.registerForm')->middleware('guest');
Route::post('/users/register', [UserController::class, 'store'])->name('users.register')->middleware('guest');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');

Route::get('/sessions/login-form', [SessionController::class, 'loginForm'])->name('sessions.loginform')->middleware('guest');
Route::post('/sessions/login', [SessionController::class, 'login'])->name('sessions.login')->middleware('guest');
Route::delete('/sessions/logout', [SessionController::class, 'logout'])->name('sessions.logout')->middleware('auth');
