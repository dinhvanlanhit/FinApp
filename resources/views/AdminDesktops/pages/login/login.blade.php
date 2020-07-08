<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Đăng Nhập - FinApp </title>
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
    <meta name="twitter:title" content="FinApp  - Đăng Nhập"/>
    <meta name="twitter:description" content="FinApp - Quản Lý Số Tiền , Tài Sản , Chi Tiêu , Thu Nhập "/>
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/font-awesome/4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDesktops/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      .logo-finapp{
        font-size:65pt; font-weight: bold
      }
      .card{
        border: solid 5px rgb(51, 153, 90)
      }
      @media only screen and (max-width: 300px) {
        .text-remember{
          font-size: 4pt;
        }
      }
      @media only screen and (max-width: 350px) {
        .text-remember{
          font-size: 5pt;
        }
        #button-login{
          padding: 0.25rem 0.5rem;
          font-size: 0.875rem;
          line-height: 1.5;
        }
      }
      @media only screen and (max-width: 450px) {
        .text-remember{
          font-size: 10pt;
        }
      }
      @media only screen and (max-width: 500px) {
        .logo-finapp {
          font-size:35pt; font-weight: bold
        }
        .card-body{
          padding: 5px;
        }
      }
      @media only screen and (max-width: 600px) {
        .logo-finapp {
          font-size:45pt; font-weight: bold
        }
        .card-body{
          padding: 10px;
        }
      }
      
      
      
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body ">
      <div class="login-logo">
      <span   class="logo-finapp"><b class="text-success">{{mb_strtoupper(setting()->company_name,'UTF-8')}}</b></span>
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
<script src="{{asset('AdminDesktops/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('AdminDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('AdminDesktops/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('app/auth/login.min.js')}}"></script>
</body>
</html>
