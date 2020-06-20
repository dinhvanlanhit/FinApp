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
              <div class="col-md-2">
                <div class="form-group" >
                      <select class="form-control select2bs4" style="width: 100%;" id="idTypeCost" name="idTypeCost">
                        <option value="">Tất Cả</option>    
                        @foreach ($typecost as $item)
                            <option value="{{$item->id}}">{{$item->type_name}}</option>                      
                        @endforeach
                      </select>
                     
                </div>
              </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
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
              <table class="table table-bordered row-border hover" id="cost-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('AdminDesktops.pages.cost.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/cost/cost.js')}}"></script>
<script> 
    var cost = new cost(); 
    cost.datas={
        routes:{
          datatable:"{{route('cost_table')}}",
          insert:"{{route('cost_insert')}}",
          update:"{{route('cost_update')}}",
          delete:"{{route('cost_delete')}}",
        }
    }   
    cost.runJS();
</script>
@endsection