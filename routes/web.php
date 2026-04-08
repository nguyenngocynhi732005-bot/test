<?php

use App\Http\Controllers\MovieController;

use App\Http\Controllers\ViduLayoutController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
use App\Http\Controllers\MovieAddController;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViduLayoutController;
use App\Http\Controllers\MovieManagementController;


Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/phim', 'App\Http\Controllers\ViduLayoutController@phim')->name('phim.index');;
Route::get('/phim/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@theloai')->name('phim.theloai');



// Nguyễn Ngọc Ý Nhi
Route::get('/movie/create', 'App\Http\Controllers\MovieAddController@create')->name('movies.create');
Route::post('/movie/store', 'App\Http\Controllers\MovieAddController@store')->name('movies.store');


// Chi tiết phim 
Route::get('/phim/chitiet/{id}', [MovieController::class, 'show'])->name('movie.show');


//Hứa Kim Ngân
Route::get('/quanlyphim', [MovieManagementController::class, 'index'])->name('movie.index');
Route::get('/quanlyphim/{id}', [MovieManagementController::class, 'show'])->name('movie.show');
Route::delete('/quanlyphim/{id}', [MovieManagementController::class, 'destroy'])->name('movie.destroy');

=======
Route::get('/', [MovieController::class, 'index']);
Route::get('/phim', [ViduLayoutController::class, 'phim']);
Route::get('/phim/theloai/{id}', [ViduLayoutController::class, 'theloai']);

// PhuongAnh
use App\Http\Controllers\MovieController3;


Route::post('/timkiem', [MovieController3::class, 'search']);
>>>>>>> dfac9469f6b3f063f314d94d7d83ab3b1b8fbd5d
