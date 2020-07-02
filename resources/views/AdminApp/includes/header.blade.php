<nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('profile')}}" class="nav-link active"><b> <i class="fa fa-user"></i> <span class="full_name_show">{{Auth::user()->full_name}}</span></b></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}"  title="Fin-App" class="nav-link">
          <i class="fas fa-desktop"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout" class="nav-link" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>