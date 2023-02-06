<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finapp - Mobile Template</title>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <link rel="stylesheet" href="{{asset('ClientDesktops/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('AdminMobiles/assets/css/styleae52.css')}}">
    <meta name="keywords" content="bootstrap, mobile template, mobile, html, wallet, banking, finance" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('AdminMobiles/assets/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('AdminMobiles/assets/img/favicon.png')}}" sizes="32x32">
    <link rel="shortcut icon" href="{{asset('AdminMobiles/assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('AdminMobiles/style.css')}}">
</head>
<body>
    <div id="loader">
        <img src="{{asset('AdminMobiles/assets/img/logo-icon.png')}}" alt="icon" class="loading-icon">
    </div>
<!-- loader -->
  

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mb-10 p-2">
            <form id="form-login"  method="post">
                <div class="card">
                    <img class="btn-block" src="{{asset('SytemFinApp/logo/logofinapp.jpg')}}"/>
                   
                    <div class="card-body pb-1">
                        <div class="form-group boxed">
                            <div id="alert"></div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email">Email 
                                    <span class="email text-danger"></span>
                                </label>
                                <input type="text" class="form-control" name="email" value="dinhvanlanh.it@gmail.com" id="email" placeholder="Email">
                                
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password 
                                <span class="password text-danger"></span></label>
                                <input type="password" class="form-control" name="password" value="12345" id="password" placeholder="Password">
                                
                            </div>
                        </div>
                        <div class="form-group  ">
                            <button type="submit" id="button-login" class="btn btn-primary btn-block btn-lg">Log in</button>
                        </div>
                        <div class="form-links mt-2">
                            <div>
                                <a href="app-register.html">Đăng ký </a>
                            </div>
                            <div><a href="app-forgot-password.html" class="text-muted">Quên mật khẩu?</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="appFooter">
            <div class="footer-title">
                Bản quyền © Finapp 2020<br><br>
                <a href="24hcode.net">DINH VAN LE</a>
            </div>
          
    </div>
    </div>

   
        <script> routes = {
            login:"{{route('login')}}",
            dashboard:"{{route('dashboard')}}"
        }
    </script>
    <script src="{{asset('AdminMobiles/assets/js/lib/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/lib/popper.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/baseae52.js')}}"></script>
    <script src="{{asset('app/login/login.min.js')}}"></script>
</body>
</html>