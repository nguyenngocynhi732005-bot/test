<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\MovieAddController;
=======
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViduLayoutController;

// Trang danh sách phim
>>>>>>> 96e54bb77d1663a561766709e7dd071ed919c564

// Trần Thị Ngọc An
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/phim', 'App\Http\Controllers\ViduLayoutController@phim')->name('phim.index');;
Route::get('/phim/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@theloai')->name('phim.theloai');


<<<<<<< HEAD
// Nguyễn Ngọc Ý Nhi
Route::get('/movie/create', 'App\Http\Controllers\MovieAddController@create')->name('movies.create');
Route::post('/movie/store', 'App\Http\Controllers\MovieAddController@store')->name('movies.store');
=======

// Chi tiết phim
Route::get('/phim/chitiet/{id}', [MovieController::class, 'show'])->name('movie.show');




>>>>>>> 96e54bb77d1663a561766709e7dd071ed919c564
