@extends('ClientDesktops.layouts.layout')
@section('desktops')

<div class="card">


    <!-- /.card-header -->
    <div class="card-body card-body">
      <div class="error-page ">
        <h2 class="headline text-warning"><b> 404</b></h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Giáo sư! Trang không tìm thấy.</h3>
          <p  class="text-danger">
              Tài khoản của bạn không có quyền thao tác tác vụ đó !
          </p>
          <p>
            <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
           
          </p>
        </div>
        <!-- /.error-content -->
      </div>
    </div>
</div>
      <!-- /.error-page -->
  
@endsection
@section('javascript')
@endsection