@extends("layouts.phim_layout")
@section("title", "Kết quả tìm kiếm")

@section("content")
<div style="padding: 20px;">
    <h3 class="search-title">Kết quả tìm kiếm cho: "{{ $keyword }}"</h3>

    <div class='list-movie'>
        @if(count($movies) > 0)
            @foreach($movies as $mv)
            @php
                $poster = !empty($mv->image_link)
                    ? $mv->image_link
                    : (!empty($mv->image)
                        ? 'https://image.tmdb.org/t/p/original' . $mv->image
                        : '');
            @endphp
            <div class='movie'>
                <img src="{{ $poster }}" alt="{{ isset($mv->movie_name_vn) ? $mv->movie_name_vn : $mv->movie_name }}">
                <div class="movie-info">
                    <b>{{ isset($mv->movie_name_vn) ? $mv->movie_name_vn : $mv->movie_name }}</b><br />
                    <small class="text-muted">{{ $mv->release_date }}</small>
                </div>
            </div>
            @endforeach
        @else
            <p>Không tìm thấy bộ phim nào phù hợp với từ khóa.</p>
        @endif
    </div>
</div>

<style>
    .search-title {
        margin-bottom: 20px;
        color: #111;
        font-weight: 700;
    }

    .list-movie {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
    }

    .movie {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .movie:hover {
        transform: translateY(-4px);
    }

    .movie img {
        width: 100%;
        height: 270px;
        object-fit: cover;
        display: block;
    }

    .movie-info {
        padding: 10px;
        min-height: 78px;
        line-height: 1.35;
    }

    @media (max-width: 992px) {
        .list-movie {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 576px) {
        .list-movie {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection