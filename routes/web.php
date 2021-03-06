<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\AnswerController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts' ,[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::get('/articles/{id}',[ArticleController::class, 'show'])->name('articles.show');

Route::get('/questionnaires/info', [QuestionnaireController::class, 'index'])->name('questionnaires.info');
Route::get('/questionnaires/create', [QuestionnaireController::class, 'create'])->name('questionnaires.create');
Route::post('/questionnaires', [QuestionnaireController::class, 'store'])->name('questionnaires.store');
Route::get('/questionnaires/info/{id}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');

Route::get('/questionnaires', [AnswerController::class, 'index'])->name('questionnaires.index');
Route::get('/questionnaires/answer/{id}', [AnswerController::class, 'create'])->name('answer.create');
Route::post('/questionnaires/answer', [AnswerController::class, 'store'])->name('answer.store');
Route::get('/questionnaires/submitted', [AnswerController::class, 'submitted'])->name('answer.submitted');
