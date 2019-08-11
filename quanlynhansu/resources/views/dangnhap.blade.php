<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<!-- Latest compiled and minified CSS & JS -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="#" method="POST" role="form">
					<legend>Đăng nhập</legend>
					
						<div class="alert alert-danger error errorLogin" style="display: none;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<p style="color:red; display:none;" class="error errorLogin"></p>
						</div>
					
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
						<p style="color:red; display: none" class="error errorEmail"></p>
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						<p style="color:red; display: none" class="error errorPassword"></p>
					</div>
					<div class="form-group">
						<input type="checkbox" name="remember"> Ghi nhớ
					</div>
					
		
					<button id="dang-nhap" type="submit" class="btn btn-primary">Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="{{url('js/dangnhap.js')}}"></script>
</html>