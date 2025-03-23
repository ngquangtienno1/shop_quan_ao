@extends('admin.layouts.AdminLayout')

@section('title', 'Chi tiết danh mục')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 50%; max-width: 600px;">
        <div class="card-header text-center text-black">
            <h4 class="mb-0">Chi tiết danh mục</h4>
        </div>
        <div class="card-body">
            @if(isset($category))
                <p class="fs-5"><strong>Tên danh mục:</strong> {{ $category->name }}</p>
                <p class="fs-5"><strong>Mô tả:</strong> {{ $category->description }}</p>
            @else
                <p class="text-danger fs-5">Không tìm thấy danh mục.</p>
            @endif
            <div class="text-center mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">Quay lại</a>
            </div>
        </div>
    </div>
</div>

@endsection
