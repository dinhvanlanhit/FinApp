@extends('ClientDesktops.layouts.layout')
@section('desktops')
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
              <div class="col-md-2">
                <div class="form-group">
                  <button type="button"  class="btn btn-success btn-block" id="btn-insert">Thêm mới</button>
                 </div>
              </div>
          </div>
      </form>
      <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-sm row-border hover text-small" id="membership-table"></table>
        </div>
      </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
   <a href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
  </div>
</div>
@include('ClientDesktops.pages.membership.include')
@endsection
@section('javascript')
<script src="{{asset('app/desktops/membership/membership.js')}}"></script>
<script> 
    var membership = new membership(); 
    membership.datas={
        idKey:"{{Auth::user()->id}}",
        routes:{
          datatable:"{{route('membership_datatable')}}",
          insert:"{{route('membership_insert')}}",
          update:"{{route('membership_update')}}",
          delete:"{{route('membership_delete')}}",
          permission:"{{route('membership_permission')}}",
        }
    }   
    membership.runJS();
</script>
@endsection