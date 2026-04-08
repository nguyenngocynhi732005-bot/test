<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;    // ⭐ Import DB
use Illuminate\Support\Facades\View;  // ⭐ Import View


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // Lấy tất cả thể loại
        $genres = DB::table('genre')->get();

        // Share biến $genres cho toàn bộ view (layout sử dụng)
        View::share('genres', $genres);
    }
}