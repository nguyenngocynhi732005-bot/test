<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViduLayoutController;

// Trang danh sách phim

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/phim', 'App\Http\Controllers\ViduLayoutController@phim')->name('phim.index');;
Route::get('/phim/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@theloai')->name('phim.theloai');



// Chi tiết phim
Route::get('/phim/chitiet/{id}', [MovieController::class, 'show'])->name('movie.show');




