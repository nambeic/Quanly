<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="add_close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Xác nhận</h2>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form id="del" class="hidden" action="{{ route('danhsach.destroy', '') }}">@csrf</form>
        <h4 align="center" style="margin:0;">Bạn chắc chắn muốn xóa chứ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Đồng ý</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </div>
    </div>
  </div>
</div>