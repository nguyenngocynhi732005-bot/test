<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movie';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'status',
        'movie_name',
        'original_name',
        'movie_name_vn',
        'image',
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

    public function genres()
    {
        return $this->belongsToMany(
            \App\Models\Genre::class,
            'movie_genre',
            'id_movie',
            'id_genre'
        );
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
