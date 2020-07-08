<aside class="main-sidebar elevation-4 sidebar-light-success">

    <a href="{{route('dashboard')}}" class="brand-link text-center">
       <span  style="font-size:23pt; font-weight: bold"><b class="text-success">{{mb_strtoupper(setting()->company_name,'UTF-8')}}</b></span>

    </a>
    <div class="sidebar">
      @include('AdminDesktops.includes.menu')
    </div>
  </aside>
