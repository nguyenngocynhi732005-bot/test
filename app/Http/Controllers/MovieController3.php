<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class MovieController3 extends Controller
{
    public function search(Request $request)
    {
        $keyword = trim((string) $request->input('keyword', ''));

        $movies = DB::select(
            "select * from movie where status = 1 and (movie_name_vn like ? or movie_name like ? or original_name like ?)",
            ["%" . $keyword . "%", "%" . $keyword . "%", "%" . $keyword . "%"]
        );

        $genres = DB::select("select * from genre");

        return view('movie.search', [
            'movies' => $movies,
            'keyword' => $keyword,
            'genres' => $genres
        ]);
    }
}