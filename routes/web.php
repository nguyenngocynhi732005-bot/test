<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/phim', 'App\Http\Controllers\ViduLayoutController@phim');
Route::get('/phim/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@theloai');
