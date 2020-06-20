<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item ">
        <a href="{{route('dashboard')}}/" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Tông Quan
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview ">
        <a href="{{route('event')}}" class="nav-link active">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Sự Kiện
           
          </p>
        </a>
      
      </li>
      <li class="nav-item ">
        <a href="{{route('shopping')}}" class="nav-link active">
          <i class="nav-icon fa fa-shopping-bag"></i>
          <p>
            Mua Sắm
            
          </p>
        </a>
        
        
      </li>
      <li class="nav-item has-treeview ">
        <a href="{{route('cost')}}" class="nav-link active ">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Chi Tiêu
           
          </p>
        </a>
      
      </li>
      <li class="nav-item has-treeview ">
        <a href="{{route('salary')}}" class="nav-link active">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Thu Nhập
           
          </p>
        </a>
        
      </li>
      <li class="nav-item has-treeview ">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Quản Lý Nợ
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle text-info nav-icon"></i>
              <p>Nợ Ngân Hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle text-info nav-icon"></i>
              <p>Nợ Khác</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview ">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Cho Vay
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle text-info nav-icon"></i>
              <p>Cho Họ Vay</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle text-info nav-icon"></i>
              <p>Tiền Lãi</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item has-treeview ">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-money"></i>
          <p>
            Đầu Tư
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="far fa-circle text-info nav-icon"></i>
              <p>Tiền Đầu Tư</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview ">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Cài Đặt
         
          </p>
        </a>
 
      </li>
      <li class="nav-item">
        <a href="{{route('profile')}}" class="nav-link active">
          <i class="nav-icon fas fa-user"></i>
          <p>
             Hô sơ cá nhân
          </p>
        </a>
      </li>
    </ul>
  </nav>