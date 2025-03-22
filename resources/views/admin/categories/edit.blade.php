<!doctype html>
<html lang="en">
<!-- Mirrored from themesbrand.com/dason/layouts/ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Mar 2025 10:58:56 GMT -->

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8" />
    <title>Orders | Dason - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('admin.layouts.libs_css')
</head>

<body data-topbar="dark">
    <!-- <body data-layout="horizontal"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.header')
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <a href="{{ route('categories.index') }}" class="btn btn-warning">Quay lại</a>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Quản lý
                                                danh mục</a>
                                        </li>
                                        <li class="breadcrumb-item active">Sửa danh mục</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sửa danh mục</h4>
                            </div>
                            <form action="{{ route('categories.update',$category->id) }}" method="POST">

                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Tên danh mục</label>
                                                <input type="text" class="form-control" id="validationCustom01"
                                                    name="name" placeholder="Mời nhập tên danh mục"
                                                    value="{{ $category->name }}">

                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom02">Mô tả</label>
                                                <input type="text" class="form-control" id="validationCustom02"
                                                    placeholder="Mời nhập mô tả" value="{{ $category->description }}"
                                                    name="description">
                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-primary" type="submit">Sửa</button>
                                </div>

                            </form>

                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end main content-->

                </div>
                <!-- END layout-wrapper -->


                <!-- Right Sidebar -->


            </div>

        </div>


    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    @include('admin.layouts.libs_js')

</body>

<!-- Mirrored from themesbrand.com/dason/layouts/ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Mar 2025 10:58:56 GMT -->

</html>
