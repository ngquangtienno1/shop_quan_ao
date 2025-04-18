@extends('admin.layouts.AdminLayout')

@section('title', 'Quản lý danh mục')

@section('content')



    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4><a href="{{ route('categories.index') }}" class="text-black">Danh sách danh mục</a></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý danh mục</a>
                                        </li>
                                        <li class="breadcrumb-item active">Danh sách danh mục</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <div class="search-box me-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <form action="{{ route('categories.search') }}" method="GET">
                                                        <div class="input-group">
                                                            <input type="text" name="keyword" class="form-control"
                                                                placeholder="Tìm kiếm..." value="{{ request()->keyword }}"
                                                                id="searchInput">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="bx bx-search-alt"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <form id="bulkDeleteForm" action="{{ route('categories.bulkDelete') }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" id="deleteSelected"
                                                    class="btn btn-danger btn-rounded waves-effect waves-light mb-2"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa đã chọn">
                                                    <i class="mdi mdi-delete"></i> <span class="delete-text">Xóa đã
                                                        chọn</span>
                                                </button>

                                            </form>

                                        </div>

                                        <div class="col-sm-8">
                                            <a href="{{ route('categories.create') }}">
                                                <div class="text-sm-end">
                                                    <button type="button"
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-plus me-1"></i> Thêm danh mục</button>
                                                </div>
                                            </a>

                                        </div><!-- end col-->

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">
                                                        <input type="checkbox" id="selectAll">
                                                    </th>
                                                    <th class="align-middle">STT</th>
                                                    <th class="align-middle">Tên danh mục</th>
                                                    <th class="align-middle">Mô tả</th>
                                                    <th class="align-middle">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $key => $category)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="category-checkbox"
                                                                name="category_ids[]" value="{{ $category->id }}">
                                                        </td>
                                                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                                        </td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>{{ Str::limit($category->description, 30, '...') }}</td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="{{ route('categories.show', $category->id) }}"><i
                                                                        class="mdi mdi-eye"></i></a>


                                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                                    class="text-success">
                                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                                </a>
                                                                <form
                                                                    action="{{ route('categories.destroy', $category->id) }}"
                                                                    method="POST" class="delete-form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-link text-danger"
                                                                        onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $categories->links('pagination::bootstrap-5') }}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <script>
        document.getElementById('selectAll').addEventListener('click', function() {
            let checkboxes = document.querySelectorAll('.category-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        document.getElementById('deleteSelected').addEventListener('click', function() {
            let selectedIds = [];
            document.querySelectorAll('.category-checkbox:checked').forEach(checkbox => {
                selectedIds.push(checkbox.value);
            });

            if (selectedIds.length === 0) {
                alert('Vui lòng chọn ít nhất một danh mục để xóa.');
                return;
            }

            if (!confirm('Bạn có chắc chắn muốn xóa các danh mục đã chọn?')) return;

            let form = document.getElementById('bulkDeleteForm');
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'category_ids';
            input.value = JSON.stringify(selectedIds);
            form.appendChild(input);
            form.submit();
        });
    </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".view-category").forEach(button => {
            button.addEventListener("click", function () {
                let categoryId = this.getAttribute("data-id");
    
                fetch(`/categories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Cập nhật dữ liệu vào bảng nhỏ
                        document.getElementById("detail-id").textContent = data.id;
                        document.getElementById("detail-name").textContent = data.name;
                        document.getElementById("detail-description").textContent = data.description;
                        document.getElementById("detail-created").textContent = data.created_at || 'N/A';
    
                        // Hiển thị bảng chi tiết
                        document.getElementById("categoryDetailBox").classList.remove("d-none");
                    })
                    .catch(error => console.error("Lỗi:", error));
            });
        });
    });
    
    // Ẩn bảng chi tiết khi nhấn nút đóng
    function hideCategoryDetail() {
        document.getElementById("categoryDetailBox").classList.add("d-none");
    }
    </script>
    

    <style>
        .delete-text {
            display: none;
            /* Ẩn chữ "Xóa đã chọn" */
        }

        #deleteSelected:hover .delete-text {
            display: inline;
            /* Hiển thị khi hover */
        }
    </style>

@endsection
