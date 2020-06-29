<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Quên Mật Khẩu </title>
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body">
      <div class="login-logo">
            <img class="btn-block" src="{{asset('SytemFinApp/logo/')}}/{{setting()->logo}}"/>
      </div>
      <div id="alert"></div>
      <form id="form-login" action="#"  method="GET">
        <p class="login-box-msg text-info"><strong>Bạn quên mật khẩu? Tại đây  bạn nhập email đăng ký có thể dễ dàng lấy lại một mật khẩu mới .</strong></p>
        <span class="email text-danger"></span>
        <div class="input-group mb-3">
          <input type="email" class="form-control " value="" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       

          <div class="form-group">
            <button type="submit" id="button-login" class="btn btn-danger btn-flat btn-block"> Gửi </button>
          </div>
          <div class="form-group">
            <a href="{{route('login')}}" id="button-register" class="btn btn-flat btn-success btn-block">Đăng nhập</a>
            </div>
            <div class="form-group">
              <a href="{{route('register')}}" id="button-register" class="btn btn-flat btn-info btn-block">Đăng Ký</a>
              </div>
        </div>
       
          
        
    </div>
  </div>
</div>
<script> routes = {
    login:"{{route('login')}}",
    dashboard:"{{route('dashboard')}}"
}
</script>
<script src="{{asset('AdminDesktops/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('AdminDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('AdminDesktops/dist/js/adminlte.min.js')}}"></script>
{{-- <script src="{{asset('app/auth/login.min.js')}}"></script> --}}
</body>
</html>
