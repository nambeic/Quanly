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
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" >Quản Lý Nhân Viên</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{url('dangxuat')}}">Đăng xuất</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
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
  @include ('AddModal')
  @include ('EditModal')
  @include ('DeleteModal')
  <script src="{{url('js/quanly.js')}}"></script>
</html>