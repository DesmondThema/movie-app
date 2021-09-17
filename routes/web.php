<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [MoviesController::class, 'allMovies'])->name('home');
Route::get('/favourites', [MoviesController::class, 'favouriteMovies'])->middleware('auth');
Route::view('/contact','contact');

Auth::routes();


