@extends('layouts.phim_layout')

@section('content')
    <div class="container-fluid p-0">
        <h2 class="text-center mb-4">DANH SÁCH PHIM</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Thêm</a>
        <table id="id-table" class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr class="text-center">
                    <th width="100">Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm đánh giá</th>
                    <th width="60"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset($movie->image_link) }}" width="80" class="img-thumbnail">
                        </td>
                        <td class="align-middle"><strong>{{ $movie->movie_name }}</strong></td>
                        <td class="align-middle small">{{ \Str::limit($movie->overview, 100) }}</td>
                        <td class="text-center align-middle">{{ $movie->release_date }}</td>
                        <td class="text-center align-middle font-weight-bold">{{ $movie->vote_average }}</td>
                        <td class="text-center">
    <div class="d-flex justify-content-center align-items-center" style="gap: 5px;">
        <a href="{{ route('movie.show', $movie->id) }}" class="btn btn-primary btn-sm">Xem</a>
        
        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="m-0" onsubmit="return confirm('Xóa bộ phim này?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </div>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection

<style>
    #id-table_wrapper .dataTables_info {
        padding-top: 0.35rem;
        font-size: 0.9rem;
        color: #495057;
    }

    #id-table_wrapper .dataTables_paginate {
        padding-top: 0.15rem;
    }

    #id-table_wrapper .dataTables_paginate .paginate_button {
        padding: 0.15rem 0.55rem;
        margin-left: 2px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        background: #fff;
        color: #495057 !important;
        box-shadow: none !important;
    }

    #id-table_wrapper .dataTables_paginate .paginate_button.current {
        background: #0d6efd !important;
        border-color: #0d6efd;
        color: #fff !important;
    }

    #id-table_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f1f3f5 !important;
        border-color: #ced4da;
        color: #212529 !important;
    }

    #id-table_wrapper .dataTables_paginate .paginate_button.disabled {
        opacity: 0.45;
        cursor: default;
    }
</style>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#id-table').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
                stateSave: true,

                pagingType: 'simple_numbers',
                dom: '<"d-flex justify-content-between align-items-center mb-2"lf>rt<"d-flex justify-content-between align-items-center mt-2"ip>',

                // Việt hóa (optional)
                language: {
                    lengthMenu: "_MENU_ entries per page",
                    search: "Search:",
                    paginate: {
                        previous: "«",
                        next: "»"
                    }
                }
            });
        });
    </script>
@endsection