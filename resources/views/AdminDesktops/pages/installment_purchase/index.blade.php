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
    <div class="card-body">
        <form id="formSearch">
            <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                        <input class="form-control" id="search" name="search"/>
                  </div>
                </div>
                <div class="col-md-3">
                        @include('AdminDesktops.fromControl.dateRange')
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">Tìm kiếm</button>
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
              <table class="table table-bordered row-border hover" id="installment_purchase-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('AdminDesktops.pages.installment_purchase.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/installment_purchase/installment_purchase.js')}}"></script>
<script> 
    var installment_purchase = new installment_purchase(); 
    installment_purchase.datas={
        routes:{
          datatable:"{{route('installment_purchase_table')}}",
          insert:"{{route('installment_purchase_insert')}}",
          update:"{{route('installment_purchase_update')}}",
          delete:"{{route('installment_purchase_delete')}}",
          payment:"{{route('installment_purchase_payment')}}",
          paymentUpdate:"{{route('installment_purchase_payment_update')}}",
          paymentInsert:"{{route('installment_purchase_payment_insert')}}",
          paymentDelete:"{{route('installment_purchase_payment_delete')}}",
          paymentByID:"{{route('installment_purchase_payment_ByID')}}",
          

          
        }
    }   
    installment_purchase.runJS();
</script>
@endsection