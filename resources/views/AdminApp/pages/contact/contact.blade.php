@extends('AdminApp.layouts.layout')
@section('AdminApp')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      Danh Sách Liên Hệ
    </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body card-body-dashboard">
      <form id="formSearch">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <select name="status" id="status" class="form-control select2bs4">
                  <option value="">-- Tất Cả --</option>
                  <option value="0">Chưa Xử Lý</option>
                  <option value="1">Đã Xử Lý</option>
                </select>
              </div>
            </div>
              <div class="col-md-8">
                <div class="form-group">
                      <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block formSearch">Tìm kiếm</button>
                </div>
              </div>
         
          </div>
      </form>
      <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered row-border hover text-small" id="contact-table"></table>
        </div>
      </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
   <a href="{{route('admin_dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
  </div>
</div>
<div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modal-text-status"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" data-status="" value="" id="onStatus">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('app/admin/contact/contact.js')}}"></script>
<script> 
    var contact = new contact(); 
    contact.datas={
        routes:{
         
          datatable:"{{route('admin_contact_datatable')}}",
          delete:"{{route('admin_contact_delete')}}",
          status:"{{route('admin_contact_status')}}",
        }
    }   
    contact.runJS();
</script>
@endsection