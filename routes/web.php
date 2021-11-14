<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('auth.login');
});


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts' ,[BlogController::class, 'index'])->name('posts');

Route::get('/newpost', [PostController::class, 'index'])->name('newpost');
Route::post('/newpost', [PostController::class, 'store']);
