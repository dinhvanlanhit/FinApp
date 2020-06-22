<nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item  ">
        <a href="{{route('wallet')}}" class="nav-link active"> <b class="surplus" id="surplus"> <i class="fa fa-money"></i>  : {{number_format(surplus())}} VNĐ </b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('profile')}}" class="nav-link active"><b> <i class="fa fa-user"></i> {{Auth::user()->full_name}}</b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><b>Liên Hệ</b></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <li class="nav-item">
        <a href="{{route('mobile-test')}}"  class="nav-link" role="button">
          <i class="fas fa-mobile-alt"></i>
        </a>
      </li> --}}
     
      <li class="nav-item">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout" class="nav-link" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>