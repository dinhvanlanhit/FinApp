<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finapp - Mobile Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <link rel="stylesheet" href="{{asset('AdminDesktops/plugins/fontawesome-free/css/all.min.css')}}">
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

        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2">

            <form id="form-login"  method="post">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            
                            <div class="input-wrapper">
                                <label class="label" for="idCompanies">ID <span class="idCompanies text-danger"></span></label>
                                <input type="text" class="form-control" id="idCompanies" value="1" name="idCompanies" placeholder="ID">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group basic">
                           
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail  <span class="email text-danger"></span></label>
                                <input type="email" class="form-control" id="email" value="admin@gmail.com" name="email" placeholder="Email or Username">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
        
                        <div class="form-group basic">
                            
                            <div class="input-wrapper">
                                <label class="label" for="password">Password <span class="password text-danger"></span></label>
                                <input type="password" class="form-control" value="12345" name="password"  placeholder="Password">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="app-register.html">Register Now</a>
                    </div>
                    <div><a href="app-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" id="button-login" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->
        @yield('mobiles')
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
    <script src="{{asset('AdminDesktops/app/login/login.min.js')}}"></script>
</body>
</html>