<aside class="main-sidebar elevation-4 sidebar-light-info">
    <a href="{{route('dashboard')}}" class="brand-link text-center">
      <div class="bounce">
        <b>
        <span style="font-size:23pt; font-weight: bold; color:#4285f4" class="logo">F</span>
        <span style="font-size:23pt; font-weight: bold; color:#ea4335" class="logo">I</span>
        <span style="font-size:23pt; font-weight: bold; color:#fbbc05" class="logo">N</span>
        <span style="font-size:23pt; font-weight: bold; color:#4285f4" class="logo">A</span>
        <span style="font-size:23pt; font-weight: bold; color:#34a853" class="logo">P</span>
        <span style="font-size:23pt; font-weight: bold; color:#ea4335" class="logo">P</span>
        </b>
      </div>
       {{-- <span  style="font-size:23pt; font-weight: bold"><b class="text-success">{{mb_strtoupper(setting()->company_name,'UTF-8')}}</b></span> --}}
    </a>
    <div class="sidebar">
      @include('ClientDesktops.includes.menu')
    </div>
  </aside>
