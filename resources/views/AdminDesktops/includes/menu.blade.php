<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open">
        <a href="{{route('dashboard')}}/" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Tông Quan
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Quản Lý Chi
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('wedding')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Đám cưới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('birthday')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Sinh nhật</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('shopping')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Mua Sắm</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Quản Lý Thu
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview menu-open">
          <li class="nav-item">
            <a href="{{route('salary')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Tiền Lương</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('other_salaries')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Thu Nhập Khác</p>
            </a>
          </li>
  
        </ul>
      </li>
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Quản Lý Nợ
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('wedding')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Nợ Ngân Hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('birthday')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Nợ Khác</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Cho Vay
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('wedding')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Cho Họ Vay</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('wedding')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Tiền Lãi</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Đầu Tư
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('wedding')}}" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Tiền Đầu Tư</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('profile')}}" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
             Hô sơ cá nhân
          </p>
        </a>
      </li>
    </ul>
  </nav>