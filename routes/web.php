<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;



// Route::resource('/', MoviesController::class);
Route::get('/',[ MoviesController::class, 'index']);
Route::get('/movies/{movie}', [MoviesController::class, "show"]);


// Route::view('/','index');
// Route::view('/movies','show');
