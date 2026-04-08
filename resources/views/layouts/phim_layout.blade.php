<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<style>
    .search-box-wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        text-align: center;
        padding: 20px;
    }

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

     .search-bar {
         max-width: 900px;
         margin: 0 auto;
     }

    /* Sidebar nền đen chữ trắng */
    .col-3 {
        background-color: #131212 !important;
        min-height: 100vh;
        padding-top: 20px;
    }


    .navbar-nav {
        width: 100%;
    }

    .navbar-nav .nav-link {
        color: white !important;
    }

    .navbar-nav .nav-item.active .nav-link {
        background-color: #131212 !important;
        color: white !important;
        font-weight: bold;
    }

    .navbar-nav .nav-link:hover {
        color: #1ed5a9 !important;
        text-decoration: none;
    }

    /* Flex container để banner + sidebar + content thẳng hàng */
    .main-flex-container {
        display: flex;
        flex-direction: column; /* banner đứng trên */
        align-items: center;
    }

    .content-flex-row {
        display: flex;
        width: 1000px; /* chiều rộng cố định */
    }

    .col-9 {
        padding-left: 20px;
    }

    header img {
        display: block;
    }
</style>

<body>
    <div class="main-flex-container">
        <!-- Banner -->
        <header style="width:1000px;">
            <img src="{{asset('images/banner.jpg')}}" width="1000px" style="display: block;">

            <!-- Thông tin banner, bỏ tìm kiếm -->
            <div class="search-box-wrapper" style="color: white;">
                <h2>Welcome.</h2>
                <p>Millions of movies, TV shows and people to discover. Explore now.</p>
            </div>
        </header>

        <!-- Nội dung chính: sidebar + content -->
        <main class="content-flex-row">
            <div class="col-3 pr-0">
                <nav class="navbar navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('phim')}}">Trang chủ</a>
                        </li>

                        @foreach($genres as $gn)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('phim/theloai/'.$gn->id)}}">
                                {{$gn->genre_name_vn}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>