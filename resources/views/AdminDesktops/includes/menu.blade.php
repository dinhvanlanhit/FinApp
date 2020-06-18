<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item ">
        <a href="{{route('dashboard')}}/" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Tông Quan
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Quản lý chi
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
            <a href="" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Sinh nhật</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Mua Sắm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Đám dỗ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Đám tan</p>
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