<div class="main-content">
    <div id="pagination">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Danh mục sản phẩm</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="listjs-table" id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <button type="button" class="btn btn-success add-btn"
                                                    data-bs-toggle="modal" id="create-btn"
                                                    data-bs-target="#showModal"><i
                                                        class="ri-add-line align-bottom me-1"></i> Add</button>
                                                <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                        class="ri-delete-bin-2-line"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search"
                                                        placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                                <tr>

                                                    <th>STT</th>
                                                    <th>Tên danh mục</th>
                                                    <th>Mô tả</th>
                                                    <th class="sort" data-sort="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($categories as $key => $item)
                                                    <tr>

                                                        <td>{{ $key + 1 }}</td>
                                                        <td class="customer_name">{{ $item->name }}</td>
                                                        <td class="email">{{ $item->description }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showModal">Edit</button>
                                                                </div>
                                                                <div class="remove">
                                                                    <button
                                                                        class="btn btn-sm btn-danger remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRecordModal">Remove</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did
                                                    not
                                                    find any orders for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{ $categories->links('pagination::bootstrap-5') }}

                                    <p>Đang hiển thị {{ $categories->firstItem() }} - {{ $categories->lastItem() }}
                                        trong
                                        tổng số {{ $categories->total() }} danh mục.</p>
                                    <script>
                                        $(document).on('click', '.pagination a', function(event) {
                                            event.preventDefault();
                                            let page = $(this).attr('href').split('page=')[1];
                                            fetch_data(page);
                                        });

                                        function fetch_data(page) {
                                            $.ajax({
                                                url: "/categories?page=" + page,
                                                success: function(data) {
                                                    $('#pagination').html(data);
                                                }
                                            });
                                        }
                                    </script>

                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </div>
    </div>
</div>
