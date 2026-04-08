@extends("layouts.phim_layout")
@section("title","Phim")

@section("content")
<div class='list-book'>
    @foreach($movies as $mv)
    <!-- ⭐ Link đến chi tiết phim -->
    <a href="{{ route('movie.show', $mv->id) }}" style="text-decoration:none; color:inherit; display:block;">
        <div class='book-card'>
            <img src="{{ asset($mv->image_link) }}" width='100%'>
            <div class="info">
                <b>{{ $mv->movie_name }}</b><br />
                <small class="text-muted">{{ $mv->release_date }}</small>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection

<style>
.list-book {
    display: grid;
    grid-template-columns: repeat(4, 24%);
    gap: 20px;
    padding: 20px 0;
}

.book-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s;
}

.book-card:hover {
    transform: translateY(-5px);
}

.book-card .info {
    padding: 10px;
    height: 80px;
}
</style>