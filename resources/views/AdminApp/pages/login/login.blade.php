<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin - FinApp </title>
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/icon.jpg')}}" >
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
<body class="hold-transition login-page">
<div class="login-box">
 
  <div class="card">

    <div class="card-body login-card-body">
      <div class="login-logo">
            <img class="btn-block" src="{{asset('SytemFinApp/logo/logofinapp.jpg')}}"/>
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
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Nhớ đăng nhập
              </label>
            </div>
          </div>
          <div class="col-6">
            <button type="submit" id="button-login" class="btn btn-danger btn-block"> Đăng nhập </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script> routes = {
    login:"{{route('admin_login')}}",
    dashboard:"{{route('admin_dashboard')}}"
}
</script>
<script src="{{asset('AdminDesktops/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('AdminDesktops/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('AdminDesktops/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('app/admin/login/login.min.js')}}"></script>
</body>
</html>
