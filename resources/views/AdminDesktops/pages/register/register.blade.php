<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Đăng ký thành viên </title>
	<link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/icon.jpg')}}" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <script> var langCR = '{{Session::get('langCR')}}'; var urlLangs = '{{route('getLang')}}';</script> --}}
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/font-awesome/4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/select2/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/dist/css/adminlte.css')}}">
	<link rel="stylesheet" href="{{asset('AdminDesktops/style.css')}}">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class=" register-page">
	<div class="register-box" >
		<div class="card">
			<div class="card-body ">
				<div class="register-logo">
					<img class="btn-block" src="{{asset('SytemFinApp/logo/logofinapp.png')}}" />
				</div>
				<div id="alert"></div>
				<form id="form-register">
					<div class="form-group">
						<label class="full_name">Họ và tên</label>
						<div class="input-group">
							<input type="text" class="form-control" value="" id="full_name" name="full_name" placeholder="...">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-user"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="email">Email</label>
						<div class="input-group">
							<input type="email" class="form-control" value="" id="email" name="email" placeholder="Email">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="password">Mật khẩu</label>
						<div class="input-group">
							<input type="password" class="form-control" value="" id="password" name="password" placeholder="">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-key"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="confirm_password">Nhập lại mật khẩu</label>
						<div class="input-group">
							<input type="password" class="form-control" value=""  id="confirm_password"name="confirm_password" placeholder="">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-key"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<label for="">Xác nhận</label>
						<div class="g-recaptcha" data-sitekey="{{setting()->GOOGLE_RECAPTCHA_KEY}}" ></div>
						<b><span class="text-danger" id="recaptcha-msg"></span></b>
					  </div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<button type="submit" id="button-register" class="btn btn-primary btn-block">Đăng ký</button>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
							<a href="{{route('login')}}" id="button-register" class="btn btn-success btn-block">Đăng nhập</a>
							</div>
						</div>
						
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<script>
		routes = {
			login:"{{route('login')}}",
		    register:"{{route('register')}}"
		}
	</script>
	<script src="{{asset('AdminDesktops/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/select2/js/select2.full.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/jquery-validation/additional-methods.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/moment/moment.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/plugins/toastr/toastr.min.js')}}"></script>
	<script src="{{asset('AdminDesktops/dist/js/adminlte.js')}}"></script>
	@if (setting()->GOOGLE_RECAPTCHA_KEY&&setting()->GOOGLE_RECAPTCHA_SECRET)
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	@endif
	<script src="{{asset('app/auth/register.min.js')}}"></script>
</body>

</html>