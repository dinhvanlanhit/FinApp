
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}" >
  <title>FinApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('AdminDesktops.partials.stylesheet')
</head>
<body class="sidebar-mini layout-fixed  text-sm">
    <div class="wrapper">
        <!-- Navbar -->
        @include('AdminDesktops.includes.header')
        <!-- /.navbar -->
        @include('AdminDesktops.includes.sidebar')
        <div class="content-wrapper">
            <div class="container-fluid">
              <div class="breadcrumbs" id="breadcrumbs-finApp">
                {{ Breadcrumbs::render() }}
              </div>
            </div>
            <section class="content">
              <div class="container-fluid">
                  @yield('desktops')
              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('AdminDesktops.includes.footer')
        @include('AdminDesktops.includes.main')
    </div>
        @include('AdminDesktops.partials.scripts')
        @yield('javascript')
       
</body>
</html>
