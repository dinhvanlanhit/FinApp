
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{asset('SytemFinApp/icon/')}}/{{setting()->icon}}" >
  <title>FinApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('AdminDesktops.partials.stylesheet')
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div id="loader">
      <img src="{{asset('SytemFinApp/loading/loading.gif')}}" alt="icon" class="loading-icon">
    </div>
    <div class="wrapper">
        <!-- Navbar -->
        @include('AdminDesktops.includes.header')
        <!-- /.navbar -->
        @include('AdminDesktops.includes.sidebar')
        <div class="content-wrapper">
            <div class="container-fluid ">
              <div class="breadcrumbs" id="breadcrumbs-finApp  mb-10">
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
        @if (Auth::user()->address_1=='')
        @if (\Request::route()->getName()!='profile')
        <script>
          Swal.fire({
             title: 'Thông báo',
             text: "Bạn chưa cập nhật thông tin cá nhân vui lòng cập nhật để sử dụng dịch vụ",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Cập Nhật',
             cancelButtonText: 'Hủy',
             reverseButtons: true
           }).then((result) => {
              if (result.value) {
                  return window.location.href = "{{route('profile')}}"
              }
           });
       </script>
        @endif
        @endif
</body>
</html>
