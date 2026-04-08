<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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