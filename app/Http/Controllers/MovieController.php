<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // Trang chi tiết phim
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie.detail', compact('movie'));
    }
}