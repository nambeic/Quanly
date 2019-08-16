$(document).ready(function() {

  $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {

      url: '/danhsach',
    },
    columns: [{
      data: 'hoTen',
      name: 'hoTen'
    }, {
      data: 'diaChi',
      name: 'diaChi'
    }, {
      data: 'tuoi',
      name: 'tuoi'
    }, {
      data: 'sdt',
      name: 'sdt'
    }, {
      data: 'action',
      name: 'action',
      orderable: false
    }]
  });

  $('#create_record').click(function() {
    $('.modal-title').text("Thêm mới");
    $('#action_button').val("Thêm");
    $('#action').val("Add");
    $('#formModal').modal('show');
  });

  $('#sample_form').on('submit', function(event) {
    event.preventDefault();
    if ($('#action').val() == 'Add') {
      $.ajax({
        url: $('#sample_form').attr('action'),
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          var html = '';
          if (data.errors) {
            html = '<div class="alert alert-danger">';
            for (var count = 0; count < data.errors.length; count++) {
              html += '<p>' + data.errors[count] + '</p>';
            }
            html += '</div>';
          }
          if (data.success) {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            $('#sample_form')[0].reset();
            // $('#user_table').DataTable().ajax.reload();
            setTimeout(function() {
              $('#formModal').modal('hide');
              $('#user_table0').DataTable().ajax.reload();
            }, 1000);
          }
          $('#form_result').html(html);
        }
      })
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