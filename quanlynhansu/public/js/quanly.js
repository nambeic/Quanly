$(document).ready(function() {

  $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {

      url: "danhsach",
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
    $('#sample_form')[0].reset();
    $('#AddModal').modal('show');
    $('#form_result').hide();
  });

  $('#sample_form').on('submit', function(event) {

    event.preventDefault();
    var id = $(this).attr('id');
    if ($('#action').val() == 'Add') {
      $('#form_result').show();
      $.ajax({
        url: "danhsach/",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          var html = '';
            html = '<div class="alert alert-success">' + data.success + '</div>';
            $('#sample_form')[0].reset();
            setTimeout(function() {
              $('#AddModal').modal('hide');
              $('#form_result').hide();
              $('#user_table').DataTable().ajax.reload();
            }, 1000);
          $('#form_result').html(html);
        },
        error: function(error) {
          var err = error.responseJSON.errors;
          html = '<div class="alert alert-danger">';
            for (var i in err) {
              html += '<p>' + err[i] + '</p>';
            }
            html += '</div>';
            $('#form_result').html(html);
        }
        
      })
    }

    if ($('#action').val() == "Edit") { 
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "danhsach/"+id,
        method:"PUT",
        data:  $('#sample_form').serialize(),
        // contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        // success: function(data) {
        //   var html = '';
        //     html = '<div class="alert alert-success">' + data.success + '</div>';
        //     $('#sample_form')[0].reset();
        //     setTimeout(function() {
        //       $('#AddModal').modal('hide');
        //       $('#form_result').hide();
        //       $('#user_table').DataTable().ajax.reload();
        //     }, 1000);
        //   $('#form_result').html(html);
        // },
        // error: function(error) {
        //   var err = error.responseJSON.errors;
        //   html = '<div class="alert alert-danger">';
        //     for (var i in err) {
        //       html += '<p>' + err[i] + '</p>';
        //     }
        //     html += '</div>';
        //     $('#form_result').html(html);
        // }
        success: function(data) {
          var html = '';
            html = '<div class="alert alert-success">' + data.success + '</div>';
            $('#sample_form')[0].reset();
            setTimeout(function() {
              $('#AddModal').modal('hide');
              $('#form_result').hide();
              $('#user_table').DataTable().ajax.reload();
            }, 1000);
          $('#form_result').html(html);
        },
        error: function(error) {
          var err = error.responseJSON.errors;
          html = '<div class="alert alert-danger">';
            for (var i in err) {
              html += '<p>' + err[i] + '</p>';
            }
            html += '</div>';
            $('#form_result').html(html);
        }
      });
    }
  });

  $(document).on('click', '.edit', function() {
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url: "/danhsach/" + id + "/edit",
      dataType: "json",
      success: function(html) {
        $('#hoTen').val(html.data.hoTen);
        $('#diaChi').val(html.data.diaChi);
        $('#tuoi').val(html.data.tuoi);
        $('#sdt').val(html.data.sdt);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Chỉnh sửa");
        $('#action_button').val("Sửa");
        $('#action').val("Edit");
        $('#AddModal').modal('show');
      }
    })
  });

  var user_id;
  $(document).on('click', '.delete', function() {
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
    $('#ok_button').text('Đồng Ý');
  });

  $('#ok_button').click(function() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $.ajax({
      url: "danhsach/" + user_id,
      method: "DELETE",
      beforeSend: function() {
        $('#ok_button').text('Deleting...');
      },
      success: function(data) {
        setTimeout(function() {
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
        }, 200);
      }
    })
  });

});