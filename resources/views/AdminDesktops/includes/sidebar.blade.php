<aside class="main-sidebar elevation-4 sidebar-light-lightblue">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img width="100%" src="{{asset('SytemFinApp/logo/logofinapp.jpg')}}"/>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img 
        
          @if (empty(Auth::user()->avatar))
                                src="{{asset('./data/default/profile-default.png')}}"    
                         @else
                            @if (file_exists('./data/users/users'.Auth::user()->id.'/'.Auth::user()->avatar))
                                src="{{asset('./data/users/users'.Auth::user()->id.'/'.Auth::user()->avatar)}}"
                            @else
                                    src="{{asset('./data/default/profile-default.png')}}" 
                            @endif
                        @endif
          
          id="user_avatar_sidebar" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block full_name_show">{{Auth::user()->full_name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      @include('AdminDesktops.includes.menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
