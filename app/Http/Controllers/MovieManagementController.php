<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieManagementController extends Controller
{
    // 1. Hiển thị danh sách (Chỉ lấy phim status = 1)
    public function index()
    {
        $genres = DB::table('genre')->get();
        $movies = Movie::where('status', 1)
            ->orderBy('release_date', 'DESC')
            ->get();

        return view('movie.list', compact('movies', 'genres'));
    }

    // 2. Trang chi tiết
    public function show($id)
    {
        $movie = Movie::where('status', 1)->findOrFail($id);
        return view('movie.detail', compact('movie'));
    }

    // 3. Xử lý xóa mềm
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        // Thay vì xóa khỏi DB, ta cập nhật status về 0
        $movie->update(['status' => 0]);

        return redirect()->route('movie.index')->with('success', 'Đã xóa phim thành công!');
    }
    public function manage()
    {
        $movies = Movie::where('status', 1)->get();
        return view('movie.list', compact('movies')); // Trả về trang có DataTable của bạn
    }

}
