<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Đăng Nhập - FinApp </title>
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/font-awesome/4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body ">
      <div class="login-logo">
            <img class="btn-block" src="{{asset('SytemFinApp/logo/')}}/{{setting()->logo}}"/>
      </div>
      <div id="alert"></div>
      <form id="form-login"  method="post">
        <span class="email text-danger"></span>
        <div class="input-group mb-3">
          <input type="email" class="form-control" value="" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="password text-danger"></span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" value="" name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-success">
              <input type="checkbox" id="remember">
              <label for="remember">
                Nhớ đăng nhập
              </label>
            </div>
          </div>
          <div class="col-6">
            <button type="submit" id="button-login" class="btn btn-success  btn-flat btn-block"> Đăng nhập </button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
                <button type="button" disabled id="button-login-facebook" class="btn btn-info btn-flat btn-block">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                   Đăng nhập Facebook </button>
          </div>
        </div> 
        <br>
        <div class="row">
          <div class="col-md-6 text-left">
              <a href="{{route('forgot-password')}}" class=" text-info">Tôi quên mật khẩu của tôi</a>
          </div>
          <div class="col-md-6 text-right">
              <a href="{{route('register')}}" class=" text-info">Đăng ký thành viên mới</a>
          </div>
        </div>
      </form>
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
<script src="{{asset('app/auth/login.min.js')}}"></script>
</body>
</html>
