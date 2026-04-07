@extends("layouts.phim_layout")
@section("title","Chi tiết phim")

@section("content")

<!-- ⭐ Tiêu đề phim -->
<h2>{{ $movie->movie_name_vn ?? $movie->movie_name }}</h2>

<!-- Phần chi tiết phim -->
<div style="display:flex; margin-top:20px;">
    <!-- Ảnh phim -->
    <img src="{{ $movie->image_link }}" width="300px">

    <div style="margin-left:20px;">
        <p><b>Ngày phát hành:</b> {{ $movie->release_date }}</p>
        <p><b>Quốc gia:</b> {{ $movie->country_name ?? 'Chưa có' }}</p>
        <p><b>Thời gian:</b> {{ $movie->runtime ?? 'Chưa có' }} phút</p>
        <p><b>Doanh thu:</b> {{ $movie->revenue ?? 'Chưa có' }}</p>

        <p><b>Mô tả:</b></p>
        <p>{{ $movie->overview_vn ?? 'Chưa có' }}</p>

        <!-- Trailer nếu có -->
        @if($movie->trailer)
        <a href="{{ $movie->trailer }}" target="_blank" style="
            display:inline-block; 
            background-color:#28a745; 
            color:white; 
            padding:10px 20px; 
            border-radius:5px; 
            text-decoration:none; 
            font-weight:bold; 
            margin-top:10px;
        ">
           Xem trailer
        </a>
        @endif
    </div>
</div>

@endsection