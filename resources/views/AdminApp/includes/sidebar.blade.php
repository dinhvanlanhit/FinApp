<aside class="main-sidebar elevation-4 sidebar-light-lightblue">
  <a href="{{route('dashboard')}}" class="brand-link text-center">
    <span  style="font-size:23pt; font-weight: bold"><b class="text-success">{{mb_strtoupper(setting()->company_name,'UTF-8')}}</b></span>

  </a>
    <div class="sidebar">
      @include('AdminApp.includes.menu')
    </div>
  </aside>
