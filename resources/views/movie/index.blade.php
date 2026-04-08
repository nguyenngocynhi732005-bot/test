<h1>Danh sách phim</h1>

<div style="display:flex; flex-wrap:wrap;">
@foreach($movies as $movie)
    <div style="width:200px; margin:10px; border:1px solid #ccc; padding:5px;">

        <a href="{{ route('movie.show', ['id' => $movie->id]) }}">
            <img src="{{ $movie->image_link }}" width="100%">
            <h3>{{ $movie->movie_name_vn }}</h3>
            <p>{{ $movie->release_date }}</p>
        </a>

    </div>
@endforeach
</div>