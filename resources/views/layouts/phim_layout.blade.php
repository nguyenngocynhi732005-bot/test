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

     .custom-search-input {
         border-radius: 50px 0 0 50px;
         /* Bo tròn đều bên trái */
         padding-left: 25px;
         border: none;
         height: 45px;
     }

     .custom-search-btn {
         border-radius: 0 50px 50px 0;

         padding: 0 30px;
         height: 45px;
         color: white;
         font-weight: bold;
         background: linear-gradient(to right, #1ed5a9, #01b4e4);
         border: none;
     }
 </style>


 <body>
     <header style="position: relative; width: 1000px; margin: 0 auto;">
         <img src="{{asset('images/banner.jpg')}}" width="1000px" style="display: block;">

         <div class="search-box-wrapper" style="color: white;">
             <h2>Welcome.</h2>
             <p>Millions of movies, TV shows and people to discover. Explore now.</p>

             <div class="input-group search-bar">
                 <input type="text" class="form-control custom-search-input"
                     placeholder="Nhập tên phim...">
                 <div class="input-group-append">
                     <button class="btn custom-search-btn" type="button">Tìm kiếm</button>
                 </div>
             </div>
         </div>
     </header>

     <main style="width:1000px; margin:2px auto;">
         <div class='row'>
             <div class='col-3 pr-0'>
                 <nav class="navbar navbar-light">
                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="{{url('phim')}}">Trang chủ</a>
                         </li>

                         @foreach($genres as $gn)
                         <li class="nav-item">
                             {{-- Tự động tạo link dựa trên id và hiển thị tên tiếng Việt --}}
                             <a class="nav-link" href="{{url('phim/theloai/'.$gn->id)}}">
                                 {{$gn->genre_name_vn}}
                             </a>
                         </li>
                         @endforeach
                     </ul>
                 </nav>
             </div>
             <div class='col-9'>
                 @yield('content')
             </div>
         </div>
     </main>
 </body>

 </html>