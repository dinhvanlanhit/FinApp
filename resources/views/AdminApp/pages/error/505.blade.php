@extends('AdminApp.layouts.layout')
@section('AdminApp')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body card-body">
      <div class="error-page ">
        <h2 class="headline text-warning"><b> 404</b></h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Giáo sư! Trang không tìm thấy.</h3>
          <p  class="text-danger">
              Tài khoản của bạn đã hết thời gian sủ dụng vui lòng gia hạn lại để tiếp tục sử dụng !
          </p>
          <p>
            <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
            <a href="{{route('methods_payment')}}" class="btn btn-info">Gia Hạn</a>
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