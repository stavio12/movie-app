<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvShowsController;
use Illuminate\Support\Facades\Route;



// Route::resource('/', MoviesController::class);
Route::get('/',[ MoviesController::class, 'index']);
Route::get('/movies/{movie}', [MoviesController::class, "show"]);


Route::get('/actors',[ ActorsController::class, 'index']);
Route::get('/actors/page/{page?}',[ ActorsController::class, 'index']);
Route::get('/actors/{actor}', [ActorsController::class, "show"]);

Route::get('/tvshows',[TvShowsController::class, 'index']);
Route::get('/tvshows/{show}', [TvShowsController::class, "show"]);


// Route::view('/','index');
// Route::view('/movies','show');
