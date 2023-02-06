<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Quên Mật Khẩu</title>
	<link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
	<link rel="stylesheet" href="{{asset('ClientDesktops/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{asset('ClientDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('ClientDesktops/dist/css/adminlte.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div id="" class="card formRecoverCode ">
			<form id="formRecoverCode">
				<div class="card-header">
					<h3 class="card-title">Nhập mã bảo mật</h3>
				</div>
				<div class="card-body card-body-dashboard">
					<p style="font-size: 10pt">Chúng tôi đã gửi cho bạn mã đến : {{ Session::get('EMAIL')}}</p>
					<p style="font-size: 10pt">Vui lòng kiểm tra mã trong email của bạn. Mã này gồm 6 số.</p>
					<div class="recover_code"></div>
					<div class="form-group mb-3">
						<input type="text" class="form-control " required value="" name="remember_token" placeholder=" .... ">
						<input type="text" class="form-control d-none" readonly value="{{$email}}" id="email" name="email" placeholder=" .... ">
					</div>
				</div>
				<div class="card-footer">
					<a href="{{route('forgot-password')}}" class="btn btn-danger btn-sm btn-flat pull-right" id="btn-cancel-formSendEmail">Hủy</a>
					<button type="button" class="btn btn-success btn-sm btn-flat pull-left" value="" id="btn-formSendEmail">Bạn chưa có mã?</button>
					<button type="submit" id="button-recover_code" class="btn btn-primary btn-sm btn-flat pull-right">Tiếp tục</button>
				</div>
			</form>
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
	<script src="{{asset('ClientDesktops/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('ClientDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('ClientDesktops/dist/js/adminlte.min.js')}}"></script>
	<script src="{{asset('app/auth/forgot.min.js')}}"></script>
</body>

</html>