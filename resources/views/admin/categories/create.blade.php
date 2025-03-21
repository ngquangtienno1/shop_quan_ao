<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="main-content">
        <div id="pagination">
            <div class="page-content">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                        
                    </div><br>
                    <form class="tablelist-form" autocomplete="off">
                        <div class="modal-body">
                            <div class="mb-3" id="modal-id" style="display: none;">
                                <label for="id-field" class="form-label">ID</label>
                                <input type="text" id="id-field" class="form-control" placeholder="ID" readonly="">
                            </div>
    
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Tên danh mục</label>
                                <input type="text" id="customername-field" class="form-control" placeholder="Vui lòng nhập tên danh mục"
                                    required="">
                                <div class="invalid-feedback">Vui lòng nhập tên danh mục</div>
                            </div>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Mô tả</label>
                                <input type="text" id="customername-field" class="form-control" placeholder="Vui lòng nhập mô tả"
                                    required="">
                                <div class="invalid-feedback">Vui lòng nhập mô tả</div>
                            </div>
    
                        </div>
                        <div class="modal-footer" style="display: block;">
                            <div class="hstack gap-2 justify-content-end">
                                <button class="btn btn-light" type="reset">Hoàn tác</button>
                                <button class="btn btn-success" id="add-btn" type="submit">Thêm</button>
                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>

