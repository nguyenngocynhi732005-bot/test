<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Movie extends Model
{
    protected $table = 'movie'; // tên bảng trong database
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'movie_name_vn',
        'movie_name',
        'image_link',
        'release_date',
        'country_name',
        'runtime',
        'revenue',
        'overview_vn',
        'trailer',
        'popularity',
        'vote_average',
    ];

    // ⭐ Thêm quan hệ genres
    public function genres()
    {
        return $this->belongsToMany(
            \App\Models\Genre::class, // tên model Genre
            'movie_genre',            // bảng pivot
            'id_movie',               // khóa ngoại của Movie trong pivot
            'id_genre'                // khóa ngoại của Genre trong pivot
        );
    }
}
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    // Khai báo tên bảng (nếu tên bảng trong DB của bạn là 'movie' thay vì 'movies')
    protected $table = 'movie';

    // Khai báo khóa chính (nếu không phải là 'id')
    protected $primaryKey = 'id'; 

    // Cho phép Laravel cập nhật nhanh các cột này
    protected $fillable = ['status', 'movie_name_vn', 'image', 'description', 'release_date', 'vote_average'];

    // Tắt timestamps nếu bảng của bạn không có cột created_at và updated_at
    public $timestamps = false;

    // Scope để chỉ lấy phim đang hiển thị
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
>>>>>>> 53018c37bd3d93addef5358bfc654e4720e818ec
