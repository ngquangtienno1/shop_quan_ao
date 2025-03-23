@extends('admin.layouts.AdminLayout')
@section('title', 'Danh sách đơn hàng')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Danh sách đơn hàng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý đơn hàng</a></li>
                                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
                                                <input type="text" class="form-control" placeholder="Search...">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;" class="align-middle">
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th class="align-middle">Mã đơn hàng</th>
                                                <th class="align-middle">Tên người nhận</th>
                                                <th class="align-middle">Ngày đặt hàng</th>
                                                <th class="align-middle">Đơn giá</th>
                                                <th class="align-middle">Trạng thái thanh toán</th>
                                                <th class="align-middle">Phương thức thanh toán</th>
                                                <th class="align-middle">Chi tiết đơn hàng</th>
                                                <th class="align-middle">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $key => $order)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="orderidcheck01">
                                                            <label class="form-check-label" for="orderidcheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);"
                                                            class="text-body fw-bold">{{ $order->order_code }}</a> </td>
                                                    <td>{{ $order->user->name }}</td>
                                                    <td>
                                                        {{ $order->order_date }}
                                                    </td>
                                                    <td>
                                                        {{ $order->total_price }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-pill bg-success-subtle text-success  font-size-12">{{ $order->payment_status }}</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-mastercard me-1"></i> {{ $order->order_status }}
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{ route('orders.show', $order->id) }}" type="button"
                                                            class="btn btn-primary btn-sm btn-rounded">
                                                            Chi tiết
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-success"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-danger"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $orders->links(), 'pagination::bootstrap-5' }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2025 © Dason.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design &amp; Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
