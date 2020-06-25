<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open-new">
        <a href="{{route('dashboard')}}/" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Tổng Quan
          </p>
        </a>
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('event')}}" class="nav-link ">
          <i class="nav-icon fas fa-umbrella"></i>
          <p>
            Sự Kiện
           
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview menu-open-new">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Sự Kiện Của Tôi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('groupmyevent')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Nhóm Sự Kiện</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('myevent')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dánh Sách Sự Kiện</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('shopping')}}" class="nav-link ">
          <i class="nav-icon fa fa-shopping-bag"></i>
          <p>
            Mua Sắm
            
          </p>
        </a>
        
        
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('cost')}}" class="nav-link  ">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Chi Tiêu
           
          </p>
        </a>
      
      </li>
      <li class="nav-item menu-open-new ">
        <a href="{{route('salary')}}" class="nav-link ">
          <i class="nav-icon fas fa-credit-card"></i>
          <p>
            Thu Nhập
           
          </p>
        </a>
        
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('debt')}}" class="nav-link ">
          <i class="nav-icon fas fa-university"></i>
          <p>
            Khoản Nợ
           
          </p>
        </a>
      </li>
      <li class="nav-item menu-open-new ">
        <a href="{{route('lendloan')}}" class="nav-link ">
          <i class="nav-icon fas fa-area-chart"></i>
          <p>
            Cho Vay
            
          </p>
        </a>
      </li>
      {{-- <li class="nav-item menu-open-new ">
        <a href="" class="nav-link ">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Chuyển Khoản
          </p>
        </a>
      </li> --}}
      <li class="nav-item menu-open-new">
        <a href="{{route('invest')}}" class="nav-link ">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Đầu Tư
          
          </p>
        </a>
        
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('goals_dreams')}}" class="nav-link ">
          <i class="nav-icon fas fa-futbol-o"></i>
          <p>
            Mục Tiêu 
          
          </p>
        </a>
        
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('wallet')}}" class="nav-link ">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Ví Tiền
          
          </p>
        </a>
        
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('asset')}}" class="nav-link ">
          <i class="nav-icon fas fa-hdd-o"></i>
          <p>
            Tài Sản
          
          </p>
        </a>
        
      </li>
      <li class="nav-item menu-open-new">
        <a href="{{route('profile')}}" class="nav-link ">
          <i class="nav-icon fas fa-user"></i>
          <p>
             Hô sơ cá nhân
          </p>
        </a>
      </li>
    </ul>
  </nav>