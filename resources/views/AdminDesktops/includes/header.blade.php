<nav class="main-header navbar navbar-expand navbar-dark navbar-success">
	<!-- Left navbar links -->
	<ul class="navbar-nav ">
		<li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item  ">
			<a href="{{route('wallet')}}" class="nav-link active"> <b class="surplus" id="surplus"> {{number_format(surplus())}} </b> <b  class=""> VNĐ </b>
			</a>
		</li>
		@if (Session::get('view_users')!=null) 
				<a href="javascript:void(0)" class="nav-link active"><b> {{user()->full_name}}</b></a>
		@else
			@if (Auth::user()->type=='membership')
				<a href="javascript:void(0)" class="nav-link active"><b> {{user()->full_name}}</b></a>
			@endif
		@endif
		<li class="nav-item d-none d-sm-inline-block"> <a href="{{route('contact')}}" class="nav-link active"><b>Liên Hệ</b></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">

		<li class="nav-item dropdown">
			<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle active"> 
        <i class="fa fa-user-circle d-sm-none"></i>  <b class="d-none d-sm-inline-block">{{Auth::user()->full_name}} </b>
			</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
				<li><a href="{{route('profile')}}" class="dropdown-item"><i class="fas fa-user"></i> Hô Sơ Cá Nhân</a>
				</li>@if (Auth::user()->type=='admin')
				<li><a href="{{route('admin_users')}}" class="dropdown-item"><i class="fas fa-cogs"></i> Hệ Thống </a>
				</li>@endif
				<li>
					<a href="javascript:void(0)" data-toggle="modal" class="dropdown-item" data-target="#modal-logout" class="nav-link" role="button"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
				</li>
			</ul>
	</ul>
</nav>