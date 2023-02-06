<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FinApp - Đăng Nhập</title>
	<meta name="description" content="Fin App - Quản Lý Tài Chính Của Bạn"/>
    <meta name="keywords" content="FinApp - Quản Lý Tài Sản,Chi Tiêu,Tiệc Đám Cưới,Thu Nhập,Hàng Tháng,Hàng Năm"/>
    <meta name="author" content="FinApp"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="FinApp"/>
    <meta property="og:image" content="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}"/>
    <meta property="og:image:width" content="{{icon_w()}}"/>
    <meta property="og:image:height" content="{{icon_h()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="FinApp - Đăng Nhập"/>
    <meta property="og:description" content="FinApp - Quản Lý Tài Sản,Chi Tiêu,Tiệc Đám Cưới,Thu Nhập,Hàng Tháng,Hàng Năm"/>
    <meta property="og:url" content="http://finapp.fun/"/>
    <meta property="fb:app_id" content=""/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@FinApp"/>
    <meta name="twitter:title" content="FinApp - Đăng Nhập"/>
    <meta name="twitter:description" content="FinApp - Quản Lý Tài Sản,Chi Tiêu,Tiệc Đám Cưới,Thu Nhập,Hàng Tháng,Hàng Năm"/>
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}" >
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <link rel="stylesheet" href="{{asset('ClientDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('ClientDesktops/plugins/font-awesome/4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('ClientDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('ClientDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('ClientDesktops/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('ClientDesktops/style.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
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
      </div>
      <div id="alert"></div>
      <form id="form-login"  method="post">
        <span class="email text-danger"></span>
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="" name="email" placeholder="Tài khoản">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="password text-danger"></span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" value="" name="password"  placeholder="Mật khẩu">
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
              <label for="remember" class="text-remember">
                Nhớ đăng nhập
              </label>
            </div>
          </div>
          <div class="col-6">
            <button type="submit" id="button-login" class="btn  btn-outline-info btn-flat btn-block"> Đăng nhập </button>
          </div>
        </div>
        <br>
        @if (setting()->FACEBOOK_APP_ID!=''&&setting()->FACEBOOK_APP_SECRET&&setting()->FACEBOOK_APP_CALLBACK_URL)
        <div class="row">
          <div class="col-md-12">
                <a href="{{route('login-redirect','facebook')}}"  id="button-login-facebook" class="btn btn-info btn-flat btn-block">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                   Đăng nhập Facebook </a>
          </div>
        </div> 
        <br>
        @endif
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
              <a href="{{route('forgot-password')}}" class="btn btn-flat btn-block btn-outline-dark">Tôi quên mật khẩu của tôi</a>
            </div>
            <div class="form-group">
              <a href="{{route('register')}}" class="btn btn-flat btn-block btn-outline-info ">Đăng ký thành viên mới</a>
            </div>
              
              
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
<script src="{{asset('ClientDesktops/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('ClientDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('ClientDesktops/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('app/auth/login.min.js')}}"></script>
</body>
</html>
