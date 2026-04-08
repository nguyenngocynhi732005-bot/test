<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieAddController extends Controller
{
    public function create()
    {
        // Lấy tất cả thể loại để hiển thị menu bên trái hoặc dropdown
        $genres = DB::table('genre')->get();
        // Trỏ vào thư mục movie/add_movie.blade.php theo ảnh cấu trúc thư mục của bạn
        return view('movie.add_movie', compact('genres'));
    }

    public function store(Request $request)
    {
        // 1. Kiểm tra dữ liệu (Validation) - Tiếng Việt theo yêu cầu Thành viên 5
        $request->validate([
            'movie_name'    => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d',
            'description'   => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required'    => ':attribute không được để trống.',
            'image'       => 'Tệp tải lên phải là hình ảnh.',
            'date_format' => 'Định dạng ngày phải là yyyy-mm-dd.',
        ], [
            'movie_name'    => 'Tên tiếng Anh',
            'movie_name_vn' => 'Tên tiếng Việt',
            'release_date'  => 'Ngày phát hành',
            'description'   => 'Mô tả',
            'image'         => 'Ảnh đại diện',
        ]);

        // 2. Xử lý lưu ảnh vào public/images
        $imageName = null;
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // 3. Chèn vào bảng 'movie' (Khớp các cột trong SQL của bạn)
        try {
            $inserted = DB::table('movie')->insert([
                'movie_name'    => $request->movie_name,
                'movie_name_vn' => $request->movie_name_vn,
                'original_name' => $request->movie_name,
                'release_date'  => $request->release_date,
                'overview_vn'   => $request->description,
                'image'         => $imageName,
                'image_link'    => $imagePath,
                'status'        => 1,
            ]);
            
            if ($inserted) {
                return redirect()->route('phim.index')->with('success', 'Thêm phim thành công!');
            } else {
                return back()->withErrors(['movie_name' => 'Lỗi nhập dữ liệu vào database.'])->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Lỗi: ' . $e->getMessage()])->withInput();
        }
    }
}