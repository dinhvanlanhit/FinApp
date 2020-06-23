<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Đăng Ký Thành Viên Với FinApp</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{asset('AdminDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('AdminDesktops/dist/css/adminlte.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
	<div class="register-box" >
		<div class="card">
			<div class="card-body register-card-body">
				<div class="register-logo">
					<img class="btn-block" src="{{asset('SytemFinApp/logo/logofinapp.jpg')}}" />
				</div>
				<div id="alert"></div>
				<form id="form-register">
					<div class="form-group">
						<label class="email">Loại người dùng</label>
						<div class="input-group">
							<select name="user_type" class="form-control">
								<option value="0">Độc Thân</option>
								<option value="1">Đã Có Gia Đình</option>
							</select>
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-user"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="full_name">Họ Và Tên</label>
						<div class="input-group">
							<input type="text" class="form-control" value="" name="full_name" placeholder="...">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-user"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="email">Email</label>
						<div class="input-group">
							<input type="email" class="form-control" value="" name="email" placeholder="Email">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-user"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="password">Mật Khẩu</label>
						<div class="input-group">
							<input type="password" class="form-control" value="" name="password" placeholder="">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-key"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="confirm_password">Nhập Lại Mật Khẩu</label>
						<div class="input-group">
							<input type="password" class="form-control" value="" name="confirm_password" placeholder="">
							<div class="input-group-append">
								<div class="input-group-text"> <span class="fas fa-key"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" id="button-register" class="btn btn-primary btn-block">Đăng ký</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		routes = {
			login:"{{route('login')}}",
		    register:"{{route('register')}}",
		  
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
	<script src="{{asset('app/auth/register.min.js')}}"></script>
</body>

</html>