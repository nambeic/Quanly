<html>
 <head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản Lý</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <h1 align="center">Quản Lý Nhân Viên</h1>
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Thêm mới</button>
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table" style="text-align: center;">
           <thead>
            <tr>
                <th width="20%" style="text-align: center;">Họ Tên</th>
                <th width="25%" style="text-align: center;">Địa Chỉ</th>
                <th width="15%" style="text-align: center;">Tuổi</th>
                <th width="25%" style="text-align: center;">SĐT</th>
                <th width="15%" style="text-align: center;">Hành Động</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />
  </div>

 </body>
</html>
<div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới</h4>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
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
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Xác nhận</h2>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Bạn chắc chắn muốn xóa chứ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Đồng ý</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{

   url: "{{ route('quanlynhansu.index') }}",
  },
  columns:[
   {
    data: 'hoTen',
    name: 'hoTen'
   },
   {
    data: 'diaChi',
    name: 'diaChi'
   },
   {
    data: 'tuoi',
    name: 'tuoi'
   },
   {
    data: 'sdt',
    name: 'sdt'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text("Thêm mới");
     $('#action_button').val("Thêm");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('quanlynhansu.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('quanlynhansu.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   });
  }
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/quanlynhansu/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#hoTen').val(html.data.hoTen);
    $('#diaChi').val(html.data.diaChi);
    $('#tuoi').val(html.data.tuoi);
    $('#sdt').val(html.data.sdt);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Chỉnh sửa");
    $('#action_button').val("Sửa");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

  var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"quanlynhansu/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 200);
   }
  })
 });

});
</script>