<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open">
        <a href="{{route('admin_dashboard')}}" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Xem Tổng Quan
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin_users')}}" class="nav-link ">
          <i class="nav-icon fas fa-users"></i>
          <p>
             Người Dùng 
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="{{route('admin_contact')}}" class="nav-link ">
          <i class="nav-icon far fa-envelope"></i>
          <p>
             Tin Nhắn Liên Hệ
          </p>
          <span class="badge badge-danger right" id="countContact">{{countContact()}}</span>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="" class="nav-link ">
          <i class="nav-icon fas fa-users"></i>
          <p>
             Thành Viên Hệ Thống
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="{{route('admin_roles')}}" class="nav-link ">
          <i class="nav-icon fas  fa-check"></i>
          <p>
             Phân Quyền
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="{{route('admin_setting')}}" class="nav-link ">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
             Cài Đặt Hệ Thống
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="{{route('admin_profile')}}" class="nav-link ">
          <i class="nav-icon fas fa-user"></i>
          <p>
             Hô sơ cá nhân
          </p>
        </a>
      </li>
    </ul>
  </nav>