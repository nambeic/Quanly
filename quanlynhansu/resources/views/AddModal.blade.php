<div id="AddModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="add_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới</h4>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data" action="{{ route('danhsach.store') }}">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Họ Tên : </label>
            <div class="col-md-8">
              <input type="text" name="hoTen" id="hoTen" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Địa Chỉ : </label>
            <div class="col-md-8">
              <input type="text" name="diaChi" id="diaChi" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Tuổi : </label>
            <div class="col-md-8">
              <input type="text" name="tuoi" id="tuoi" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Số điện Thoại : </label>
            <div class="col-md-8">
              <input type="text" name="sdt" id="sdt" class="form-control"/>
            </div>
          </div>
          <br />
          <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>