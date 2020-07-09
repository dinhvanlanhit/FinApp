<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Đăng ký thành viên </title>
	<meta name="description" content="FinApp Giúp Bạn Quản Lý Tài Chính"/>
    <meta name="keywords" content="Quản Lý Số Tiền , Tài Sản , Chi Tiêu , Thu Nhập"/>
    <meta name="author" content="FinApp"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="FinApp"/>
    <meta property="og:image" content="{{asset('SytemFinApp/icon/icon.jpg')}}"/>
    <meta property="og:image:width" content="240"/>
    <meta property="og:image:height" content="90"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Đăng Ký  - Fin App"/>
    <meta property="og:description" content="Quản Lý Số Tiền , Tài Sản , Chi Tiêu , Thu Nhập "/>
    <meta property="og:url" content="http://finapp.fun/"/>
    <meta property="fb:app_id" content=""/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@FinApp"/>
    <meta name="twitter:title" content="FinApp  - Đăng Ký Thành Viên"/>
    <meta name="twitter:description" content="FinApp - Quản Lý Số Tiền , Tài Sản , Chi Tiêu , Thu Nhập "/>
	<link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/icon.jpg')}}" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('AdminDesktops/style.css')}}">
</head>
<body class=" register-page">
	<div class="register-box" >
		<div class="card">
			<div class="card-body ">
				<div class="login-logo">
					<div class="bounce">
					  <span class="letter">F</span>
					  <span class="letter">I</span>
					  <span class="letter">N</span>
					  <span class="letter">A</span>
					  <span class="letter">P</span>
					  <span class="letter">P</span>
					</div>
				  {{-- <span   class="logo-finapp"><b class="text-success">{{mb_strtoupper(setting()->company_name,'UTF-8')}}</b></span> --}}
				  </div>
				<div id="alert"></div>
				<form id="form-register">
					<div class="form-group">
						<label class="full_name">Họ và tên</label>
						<div class="input-group">
							<input type="text" class="form-control" value="" id="full_name" name="full_name" placeholder="Họ và tên">
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
							<input type="password" class="form-control" value="" id="password" name="password" placeholder="Mật khẩu">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-key"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="confirm_password">Nhập lại mật khẩu</label>
						<div class="input-group">
							<input type="password" class="form-control" value=""  id="confirm_password"name="confirm_password" placeholder="Xác nhận mật khẩu">
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
								<button type="submit" id="button-register" class="btn btn-outline-primary btn-block">Đăng ký</button>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
							<a href="{{route('login')}}" id="button-register" class="btn btn-outline-success btn-block">Đăng nhập</a>
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