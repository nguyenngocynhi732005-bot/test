<?php

use App\Http\Controllers\MovieController;

use App\Http\Controllers\ViduLayoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index']);
Route::get('/phim', [ViduLayoutController::class, 'phim']);
Route::get('/phim/theloai/{id}', [ViduLayoutController::class, 'theloai']);

// PhuongAnh
use App\Http\Controllers\MovieController3;


Route::post('/timkiem', [MovieController3::class, 'search']);