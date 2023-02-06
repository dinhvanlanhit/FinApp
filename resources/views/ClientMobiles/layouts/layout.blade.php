<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finapp - Mobile Template</title>

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
    @include('AdminMobiles.includes.appHeader')
    @yield('mobiles')
    @include('AdminMobiles.includes.appBottomMenu')
    @include('AdminMobiles.includes.appMain')
    <script src="{{asset('AdminMobiles/assets/js/lib/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/lib/popper.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('AdminMobiles/assets/js/baseae52.js')}}"></script>
    <script src="{{asset('app/mobiles/main.min.js')}}"></script>
</body>
</html>