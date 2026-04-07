<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // ⭐ Dùng model để lấy đầy đủ thuộc tính
use Illuminate\Support\Facades\DB;


class ViduLayoutController extends Controller
{
    public function phim()
    {
        $genres = DB::table('genre')->get();

        // ⭐ Chỉ sửa chỗ này: dùng Movie::query() để lấy tất cả cột
        $movies = Movie::where('popularity', '>', 450)
                       ->where('vote_average', '>', 7)
                       ->orderBy('release_date', 'desc')
                       ->limit(12)
                       ->get();

        return view("viduphim.index", compact("genres", "movies"));
    }

    public function index()
    {
        $genres = DB::table('genre')->get();

        $movies = Movie::where('popularity', '>', 450)
                       ->where('vote_average', '>', 7)
                       ->orderBy('release_date', 'desc')
                       ->limit(12)
                       ->get();

        return view('viduphim.index', compact('genres', 'movies'));
    }

    public function theloai($id)
    {
        $genres = DB::table('genre')->get();

        $movies = Movie::whereHas('genres', function($q) use($id) {
            $q->where('genre.id', $id);
        })
        ->orderBy('release_date', 'desc')
        ->limit(12)
        ->get();

        return view("viduphim.index", compact("genres", "movies"));
    }
}