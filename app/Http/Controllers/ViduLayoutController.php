<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViduLayoutController extends Controller
{
    public function phim()
    {
        $genres = DB::table('genre')->get();
        $movies = DB::select("SELECT * FROM movie 
                              WHERE popularity > 450 AND vote_average > 7 
                              ORDER BY release_date DESC 
                              LIMIT 12");

        return view("viduphim.index", compact("genres", "movies"));
    }

    public function index()
    {
        $genres = DB::table('genre')->get();
        // Đảm bảo lấy dữ liệu từ bảng movie 
        $movies = DB::select("SELECT * FROM movie WHERE popularity > 450 AND vote_average > 7 ORDER BY release_date DESC LIMIT 12");

        // Truyền biến 'movies' (số nhiều) sang view 
        return view('viduphim.index', compact('genres', 'movies'));
    }
    public function theloai($id)
    {
        $genres = DB::table('genre')->get();
        $movies = DB::select("SELECT m.* FROM movie m
                              INNER JOIN movie_genre mg ON m.id = mg.id_movie
                              WHERE mg.id_genre = ?
                              ORDER BY m.release_date DESC
                              LIMIT 12", [$id]);

        return view("viduphim.index", compact("genres", "movies"));
    }
}
