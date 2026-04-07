<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieAddController;

// Trần Thị Ngọc An
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/phim', 'App\Http\Controllers\ViduLayoutController@phim')->name('phim.index');;
Route::get('/phim/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@theloai')->name('phim.theloai');


// Nguyễn Ngọc Ý Nhi
Route::get('/movie/create', 'App\Http\Controllers\MovieAddController@create')->name('movies.create');
Route::post('/movie/store', 'App\Http\Controllers\MovieAddController@store')->name('movies.store');
