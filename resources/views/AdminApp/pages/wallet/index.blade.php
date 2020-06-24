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
        <div class="row">
          <div class="col-md-12">
              <table class="table table-bordered row-border hover text-small" id="wallet-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('AdminDesktops.pages.wallet.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/wallet/wallet.js')}}"></script>
<script> 
    var wallet = new wallet(); 
    wallet.datas={
        routes:{
          datatable:"{{route('wallet_table')}}",
          insert:"{{route('wallet_insert')}}",
          update:"{{route('wallet_update')}}",
          delete:"{{route('wallet_delete')}}",
        }
    }   
    wallet.runJS();
</script>
@endsection