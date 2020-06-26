<aside class="main-sidebar elevation-4 sidebar-light-maroon">

    <a href="{{route('dashboard')}}" class="brand-link">
      <img width="100%" src="{{asset('SytemFinApp/logo/')}}/{{setting()->logo}}"/>
    </a>
    <div class="sidebar">
      @include('AdminDesktops.includes.menu')
    </div>
  </aside>
