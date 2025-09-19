<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorProfileController;

Route::get('/',[BlogController::class,'home'])->name('home');



Route::get('/register', [AuthController::class, 'showSignUp'])->name('register');
Route::post('/register', [AuthController::class, 'signUp'])->name('registration.register');

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/dashboard', [BlogController::class, 'index'])->name('dashboard');
// Route::get('/dashboard', function(){return view('dashboard');})->name('dashboard')
// ->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/articles/create', [BlogController::class, 'create'])->name('articles.create')
->middleware('auth');

Route::post('/articles', [BlogController::class, 'store'])->name('articles.store')
->middleware('auth');
Route::get('/articles/{id}',[BlogController::class,'show'])->name('articles.show');

Route::post('/dashboard', [BlogController::class, 'dashboardArticle'])->name('dashboard');

Route::get('/articles/{id}/edit',[BlogController::class, "dashboardArticleSingle"])
->name('articles.edit')->middleware('auth');

Route::put('/articles/{id}', [BlogController::class, "update"])->name('articles.update')
->middleware('auth');

Route::delete('/articles/{id}', [BlogController::class, "destroy"])->name('articles.destroy')
->middleware('auth');

Route::get('/mon-profile', [AutorProfileController::class, 'autor'])->name('profile');
Route::put('/modifier-profile', [AutorProfileController::class, 'modifier'])->name('edit-profile');

Route::post('/articles/{id}/comments', [CommentsController::class, 'comment'])->name('commentaire');

Route::delete('/comments/{id}', [CommentsController::class, 'delete'])->name('comment.delete');





