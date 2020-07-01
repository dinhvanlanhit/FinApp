<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Quên Mật Khẩu</title>
	<link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/dist/css/adminlte.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div id="" class="card formChangePassword">
			<div class="card-header">
				<h3 class="card-title">Nhập mật khẩu mới</h3>
			</div>
			<div class="card-body card-body-dashboard">
				<form id="formChangePassword">
					<div class="password"></div>
					<div class="form-group">
						<label>Nhập mật khẩu mới</label>
						<input type="password" class="form-control " value="" name="password" placeholder=" .... ">
					</div>
					<div class="form-group">
						<label>Xác nhận mật khẩu mới</label>
						<input type="password" class="form-control " value="" name="re_password" placeholder=" .... ">
					</div>
					<div class="form-group">
						<button type="submit" id="button-password" class="btn btn-info btn-block btn-flat pull-right">Tiếp tục</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		routes = {
		    login:"{{route('login')}}",
			dashboard:"{{route('dashboard')}}",
			sendEmail:"{{route('sendEmail')}}",
			recover_code:"{{route('recover_code')}}",
			password:"{{route('password')}}",
		}
	</script>
	<script src="{{asset('AdminDesktops/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/dist/js/adminlte.min.js')}}"></script>
	<script src="{{asset('app/auth/forgot.min.js')}}"></script>
</body>

</html>