@section("content")
<div class='list-book'>
    @foreach($movies as $mv)
    <div class='book-card'>
        <img src="{{ asset($mv->image_link) }}" width='100%'>
        <div class="info">
            <b>{{ $mv->movie_name }}</b><br />
            <small class="text-muted">{{ $mv->release_date }}</small>
        </div>
    </div>
    @endforeach
</div>
@endsection

<style>
    .navbar {
        background-color: #131212;

        font-weight: bold;
    }

    .nav-item a {
        color: #fff !important;
    }

    .navbar-nav {
        margin: 0 auto;
    }

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
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s;
    }

    .book-card:hover {
        transform: translateY(-5px);
        /* Hiệu ứng nổi lên khi di chuột */
    }

    .book-card .info {
        padding: 10px;
        height: 80px;
        /* Cố định chiều cao phần chữ để các card đều nhau */
    }
</style>

@extends("layouts.phim_layout")
@section("title","Phim")
@section("content")
<div class='list-book'>
    @foreach($movies as $mv)
    <div class='book'>

        <img src="{{asset($mv->image_link)}}" width='200px'
            height='200px'><br>
        <b>{{$mv->movie_name}}</b><br />

    </div>
    @endforeach
</div>
@endsection