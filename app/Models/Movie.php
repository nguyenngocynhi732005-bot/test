<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
