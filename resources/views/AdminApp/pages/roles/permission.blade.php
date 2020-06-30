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
                            <option @if($permissions) {{$permissions->contains('view')==true?'selected':''}}  @endif value="view">Xem</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Người Dùng</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                              <option  @if($permissions) {{$permissions->contains('view')==true?'selected':''}}  @endif value="view">Xem</option>
                              <option  @if($permissions) {{$permissions->contains('insert')==true?'selected':''}}  @endif value="insert">Thêm</option>
                              <option  @if($permissions) {{$permissions->contains('update')==true?'selected':''}}  @endif value="update">Sửa</option>
                              <option  @if($permissions) {{$permissions->contains('delete')==true?'selected':''}}  @endif value="delete">Xóa</option>
                              <option  @if($permissions) {{$permissions->contains('payment')==true?'selected':''}}  @endif value="payment">Thanh toán</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Tin Nhắn Liên Hệ</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                              <option @if($permissions) {{$permissions->contains('view')==true?'selected':''}}  @endif value="view">Xem</option>
                              <option @if($permissions) {{$permissions->contains('delete')==true?'selected':''}}  @endif value="delete">Xóa</option>
                              <option @if($permissions) {{$permissions->contains('status')==true?'selected':''}}  @endif value="status">Trạng Thái</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Thành Viên Hệ Thống</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                        <option  @if($permissions) {{$permissions->contains('view')==true?'selected':''}}  @endif value="view">Xem</option>
                        <option  @if($permissions) {{$permissions->contains('insert')==true?'selected':''}}  @endif value="insert">Thêm</option>
                        <option  @if($permissions) {{$permissions->contains('update')==true?'selected':''}}  @endif value="update">Sửa</option>
                        <option  @if($permissions) {{$permissions->contains('delete')==true?'selected':''}}  @endif value="delete">Xóa</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Phân Quyền</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                        <option @if($permissions) {{$permissions->contains('delete')==true?'selected':''}}  @endif value="view">Xem</option>
                        <option @if($permissions) {{$permissions->contains('insert')==true?'selected':''}}  @endif value="insert">Thêm</option>
                        <option @if($permissions) {{$permissions->contains('update')==true?'selected':''}}  @endif value="update">Sửa</option>
                        <option @if($permissions) {{$permissions->contains('delete')==true?'selected':''}}  @endif value="delete">Xóa</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Cài Đặt Hệ Thống</label>
                      <select class="form-control select2bs4" style="width:100%" multiple name="permission[]">
                        <option  @if($permissions) {{$permissions->contains('delete')==true?'view':''}}  @endif value="view">Xem</option>
                        <option  @if($permissions) {{$permissions->contains('delete')==true?'update':''}}  @endif value="update">Sửa</option>
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