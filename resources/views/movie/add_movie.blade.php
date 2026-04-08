@extends("layouts.phim_layout") 

@section("title", "Thêm Phim Mới")

@section("content")
<div class="container-fluid">
    <h3 class="text-center text-primary mt-3">THÊM PHIM</h3>
    
    {{-- Hiển thị thông báo lỗi tổng quát nếu có --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Tên tiếng Anh</label>
            <input type="text" name="movie_name" class="form-control" value="{{ old('movie_name') }}">
        </div>

        <div class="mb-3">
            <label>Tên tiếng Việt</label>
            <input type="text" name="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
        </div>

        <div class="mb-3">
            <label>Ngày phát hành (yyyy-mm-dd)</label>
            <input type="text" name="release_date" class="form-control" placeholder="2024-01-01" value="{{ old('release_date') }}">
        </div>

        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Ảnh đại diện</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
@endsection