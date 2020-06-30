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
                <div class="col-md-5">
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
              <table class="table table-bordered row-border hover text-small" id="roles-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
  <div class="modal fade" id="modal-action" >
    
    <div class="modal-dialog" role="document">
        <form id="formAction">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal-action-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body card-body-dashboard">
            
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="form-group">
                        <label>Tên </label>
                        <input class="form-control" id="name" name="name"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Ghi Chú   (Nếu có)  </label>
                        <input class="form-control" id="note" name="note"/>
                    </div>
                </div>
             
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-success" data-action="insert" data-id="" data-url="" id="onSave">Lưu</button>
        </div>
    </div>
    </div>
</form>

</div>
@endsection
@section('javascript')
<script src="{{asset('app/admin/roles/roles.js')}}"></script>
<script> 
    var roles = new roles(); 
    roles.datas={
    
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