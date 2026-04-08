<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'genre_name',
        'genre_name_vn',
    ];

    // Quan hệ ngược với Movie
    public function movies()
    {
        return $this->belongsToMany(
            \App\Models\Movie::class,
            'movie_genre',
            'id_genre',
            'id_movie'
        );
    }
}