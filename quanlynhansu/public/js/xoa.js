$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var user_id;

  $(document).on('click', '.delete', function() {
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function() {
    $.ajax({
      url: "danhsach/destroy/" + user_id,
      method: 'GET',
      beforeSend: function() {
        $('#ok_button').text('Deleting...');
      },
      success: function(data) {
        var html = '';
        html = '<div class="alert alert-success">' + data.success + '</div>';
        setTimeout(function() {
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
          $('#ok_button').text('Đồng ý');
        }, 200);
      }
    })
  });

});