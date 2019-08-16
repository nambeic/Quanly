$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"danhsach/update",
    method:"GET",
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
   url:"/danhsach/"+id+"/edit",
    method:"GET",
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
});