<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieAddController;
use App\Http\Controllers\MovieManagementController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
//Hứa Kim Ngân
Route::get('/quanlyphim', [MovieManagementController::class, 'index'])->name('movie.index');
Route::get('/quanlyphim/{id}', [MovieManagementController::class, 'show'])->name('movie.show');
Route::delete('/quanlyphim/{id}', [MovieManagementController::class, 'destroy'])->name('movie.destroy');