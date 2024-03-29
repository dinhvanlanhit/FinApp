<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
	<!-- Left navbar links -->
	<ul class="navbar-nav ">
		<li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		@if (Session::get('view_users')!=null) 
				<a href="javascript:void(0)" class="nav-link active"><b> {{user()->full_name}}</b></a>
		@else
			@if ($user->type=='membership')
				<a href="javascript:void(0)" class="nav-link active"><b> {{user()->full_name}}</b></a>
			@endif
		@endif
		<li class="nav-item d-none d-sm-inline-block"> <a href="{{route('contact')}}" class="nav-link active"><b>Liên Hệ</b></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">

		<li class="nav-item dropdown">
			<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle active"> 
				<i class="fa fa-user-circle "></i>
				{{-- <img
				 @if (empty($user->avatar)) 
				 	src="{{asset('./data/default/profile-default.png')}}" 
				 @else 
					 @if (file_exists('./data/users/users'.$user->id.'/'.$user->avatar)) src="{{asset('./data/users/users'.$user->id.'/'.$user->avatar)}}" 
						 @else src="{{asset('./data/default/profile-default.png')}}"
					@endif 
				@endif 
				class="" width="50px" height="50px" alt="User Image"> --}}

        		<b class="d-none d-sm-inline-block">{{$user->full_name}} </b>
			</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
				<li><a href="{{route('profile')}}" class="dropdown-item"><i class="fas fa-user"></i> Hô Sơ Cá Nhân</a>
				</li>@if ($user->type=='admin')
				<li><a href="{{route('admin_users')}}" class="dropdown-item"><i class="fas fa-cogs"></i> Hệ Thống </a>
				</li>@endif
				<li>
					<a href="javascript:void(0)" data-toggle="modal" class="dropdown-item" data-target="#modal-logout" class="nav-link" role="button"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
				</li>
			</ul>
	</ul>
</nav>