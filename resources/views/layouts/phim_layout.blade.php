<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

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

     .custom-search-input {
         border-radius: 50px 0 0 50px;
         /* Bo tròn đều bên trái */
         padding-left: 25px;
         border: none;
         height: 40px;
         width: 750px;
     }

     .custom-search-btn {
         border-radius: 0 50px 50px 0;

         padding: 0 30px;
         height: 40px;
         color: white;
         font-weight: bold;
         background: linear-gradient(to right, #1ed5a9, #01b4e4);
         border: none;
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
        border-radius: 10px;
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
        padding-bottom: 10px;
    }
</style>

<body>
    <div class="main-flex-container">

<header style="position: relative; width: 1000px; margin: 0 auto;">
         <img src="{{asset('images/banner.jpg')}}" width="1000px" style="display: block;">

         <div class="search-box-wrapper" style="color: white;">
             <h2>Welcome.</h2>
             <p>Millions of movies, TV shows and people to discover. Explore now.</p>

             <form action="{{ url('/timkiem') }}" method="POST" class="input-group search-bar">
                 @csrf
                 <input type="text" name="keyword" class="custom-search-input"
                     placeholder="Nhập tên phim...">
                 <div class="input-group-append">
                     <button class="btn custom-search-btn" type="submit">Tìm kiếm</button>
                 </div>
             </form>
         </div>
     </header>


        <!-- Nội dung chính: sidebar + content -->
        <main class="content-flex-row">
            <div class="col-3 pr-0" style="border-radius: 5px;">
                <nav class="navbar navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('phim')}}"><i class="fa-solid fa-film mr-2"></i>Thể loại phim</a>
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

    @yield('scripts')
</body>

</html>