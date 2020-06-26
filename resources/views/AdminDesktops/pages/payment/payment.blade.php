@extends('AdminDesktops.layouts.layout')
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
   
              <div class="col-md-3">
                  @include('AdminDesktops.fromControl.dateRange')
              </div>
              <div class="col-md-4">
                <div class="form-group">
                      <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block formSearch">Tìm kiếm</button>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="button"  class="btn btn-info btn-block" id="btn-insert">
                      
                      Gia Hạn
                    </button>
                 </div>
              </div>
          </div>
      </form>
      <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered row-border hover text-small" id="payment-table"></table>
        </div>
      </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <a  href="{{route('admin_users')}}" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
  </div>
</div>
    
@endsection
@section('javascript')
<script src="{{asset('app/desktops/payment/payment.js')}}"></script>
<script> 
    var payment = new payment(); 
    payment.datas={
        routes:{
          datatable:"{{route('history_datatable')}}",
        }
    }   
    payment.runJS();
</script>
@endsection