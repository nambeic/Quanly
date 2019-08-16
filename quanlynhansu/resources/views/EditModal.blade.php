<div id="EditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="add_close" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <span id="eform_result"></span>
        <form method="post" id="esample_form" class="form-horizontal" enctype="multipart/form-data" action="{{ route('danhsach.update','') }}">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Họ Tên : </label>
            <div class="col-md-8">
              <input type="text" name="hoTen" id="ehoTen" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Địa Chỉ : </label>
            <div class="col-md-8">
              <input type="text" name="diaChi" id="ediaChi" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Tuổi : </label>
            <div class="col-md-8">
              <input type="text" name="tuoi" id="etuoi" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Số điện Thoại : </label>
            <div class="col-md-8">
              <input type="text" name="sdt" id="esdt" class="form-control"/>
            </div>
          </div>
          <br />
          <div class="form-group" align="center">
            <input type="hidden" name="action" id="eaction" />
            <input type="hidden" name="hidden_id" id="ehidden_id" />
            <input type="submit" name="action_button" id="eaction_button" class="btn btn-warning" value="Add" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>