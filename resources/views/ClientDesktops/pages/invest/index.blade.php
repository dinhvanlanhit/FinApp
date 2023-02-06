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
                <div class="col-md-5">
                  <div class="form-group">
                        <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
                  </div>
                </div>
                <div class="col-md-3">
                        @include('ClientDesktops.fromControl.dateRange')
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
              <table class="table table-bordered table-sm row-border hover text-small" id="invest-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('ClientDesktops.pages.invest.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/invest/invest.js')}}"></script>
<script> 
    var invest = new invest(); 
    invest.datas={
        routes:{
          datatable:"{{route('invest_table')}}",
          insert:"{{route('invest_insert')}}",
          update:"{{route('invest_update')}}",
          delete:"{{route('invest_delete')}}",
        }
    }   
    invest.runJS();
</script>
@endsection