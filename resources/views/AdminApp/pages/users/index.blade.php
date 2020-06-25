@extends('AdminApp.layouts.layout')
@section('AdminApp')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      Danh Sách
    </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body card-body-dashboard">
      <form id="formSearch">
          <div class="row">
              <div class="col-md-2">
                <div class="form-group" >
                      <select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
                        <option value="">-- Tất Cả --</option>
                        <option value="1">-- Khóa --</option>
                        <option value="0">-- Mở --</option>
                      </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                      <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
                </div>
              </div>
 
              <div class="col-md-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-info btn-block formSearch">Tìm kiếm</button>
                              </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="button"  class="btn btn-success btn-block" id="btn-insert">Thêm mới</button>
                 </div>
              </div>
          </div>
      </form>
      <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered row-border hover text-small" id="users-table"></table>
        </div>
      </div>
      
      
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <a  href="{{route('admin_dashboard')}}" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
  </div>
</div>
    

@endsection
@section('javascript')
<script src="{{asset('app/admin/users/users.js')}}"></script>
<script> 
    var users = new users(); 
    users.datas={
        routes:{
          datatable:"{{route('admin_users_datatable')}}",
          status:"{{route('admin_users_status')}}",
          update:"{{route('admin_users_update')}}",
          delete:"{{route('admin_users_delete')}}",
          payment:"{{route('admin_users_payment')}}"
        }
    }   
    users.runJS();
</script>
@endsection