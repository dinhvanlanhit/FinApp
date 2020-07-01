@extends('AdminApp.layouts.layout')
@section('AdminApp')
<form id="formUpdate">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        Danh Sách
      </h3>
    </div>
    <div class="card-body card-body-dashboard">
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Xem Tổng Quan</label>
                    <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                            <option @if($permissions) {{$permissions->contains('dashboard_view')==true?'selected':''}}  @endif value="dashboard_view">Xem</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Người Dùng</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                              <option  @if($permissions) {{$permissions->contains('users_view')==true?'selected':''}}  @endif value="users_view">Xem</option>
                              <option  @if($permissions) {{$permissions->contains('users_insert')==true?'selected':''}}  @endif value="users_insert">Thêm</option>
                              <option  @if($permissions) {{$permissions->contains('users_update')==true?'selected':''}}  @endif value="users_update">Sửa</option>
                              <option  @if($permissions) {{$permissions->contains('users_delete')==true?'selected':''}}  @endif value="users_delete">Xóa</option>
                              <option  @if($permissions) {{$permissions->contains('users_data_view')==true?'selected':''}}  @endif value="users_data_view">Truy cập</option>
                              
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Thanh Toán</label>
                    <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                            <option  @if($permissions) {{$permissions->contains('payment_view')==true?'selected':''}}  @endif value="payment_view">Xem</option>
                            <option  @if($permissions) {{$permissions->contains('payment_insert')==true?'selected':''}}  @endif value="payment_insert">Thêm</option>
                            <option  @if($permissions) {{$permissions->contains('payment_update')==true?'selected':''}}  @endif value="payment_update">Sửa</option>
                            <option  @if($permissions) {{$permissions->contains('payment_delete')==true?'selected':''}}  @endif value="payment_delete">Xóa</option>
                    </select>
                  </div>
              </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Tin Nhắn Liên Hệ</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                              <option @if($permissions) {{$permissions->contains('contact_view')==true?'selected':''}}  @endif value="contact_view">Xem</option>
                              <option @if($permissions) {{$permissions->contains('contact_delete')==true?'selected':''}}  @endif value="contact_delete">Xóa</option>
                              <option @if($permissions) {{$permissions->contains('contact_status')==true?'selected':''}}  @endif value="contact_status">Trạng Thái</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Thành Viên Hệ Thống</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                        <option  @if($permissions) {{$permissions->contains('users_admin_view')==true?'selected':''}}  @endif value="users_admin_view">Xem</option>
                        <option  @if($permissions) {{$permissions->contains('users_admin_insert')==true?'selected':''}}  @endif value="users_admin_insert">Thêm</option>
                        <option  @if($permissions) {{$permissions->contains('users_admin_update')==true?'selected':''}}  @endif value="users_admin_update">Sửa</option>
                        <option  @if($permissions) {{$permissions->contains('users_admin_delete')==true?'selected':''}}  @endif value="users_admin_delete">Xóa</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Phân Quyền</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                        <option @if($permissions) {{$permissions->contains('roles_delete')==true?'selected':''}}  @endif value="roles_view">Xem</option>
                        <option @if($permissions) {{$permissions->contains('roles_insert')==true?'selected':''}}  @endif value="roles_insert">Thêm</option>
                        <option @if($permissions) {{$permissions->contains('roles_update')==true?'selected':''}}  @endif value="roles_update">Sửa</option>
                        <option @if($permissions) {{$permissions->contains('roles_delete')==true?'selected':''}}  @endif value="roles_delete">Xóa</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Cài Đặt Hệ Thống</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                        <option  @if($permissions) {{$permissions->contains('setting_view')==true?'selected':''}}  @endif value="setting_view">Xem</option>
                        <option  @if($permissions) {{$permissions->contains('setting_update')==true?'selected':''}}  @endif value="setting_update">Sửa</option>
                      </select>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('admin_roles')}}" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
      <button type="submit" class="btn btn-info onSubmit">Lưu</button>
    </div>
  </div>
</form>
</div>
</form>
@endsection
@section('javascript')
<script src="{{asset('app/admin/roles/roles.js')}}"></script>
<script> 
    var roles = new roles(); 
    roles.datas={
        id:"{{$id}}",
        routes:{
          datatable:"{{route('admin_roles_datatable')}}",
          delete:"{{route('admin_roles_delete')}}",
          update:"{{route('admin_roles_update')}}",
          insert:"{{route('admin_roles_insert')}}",
          permission:"{{route('admin_roles_permission')}}",
        }
    }   
    roles.runJS();
</script>
@endsection