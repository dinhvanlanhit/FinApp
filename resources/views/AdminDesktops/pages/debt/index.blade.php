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
                      <select class="form-control select2bs4" style="width: 100%;" id="idTypeDebt" name="idTypeDebt">
                        <option value="">Tất Cả</option>    
                        @foreach ($typedebt as $item)
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
              <table class="table table-bordered row-border hover text-small" id="debt-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('AdminDesktops.pages.debt.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/debt/debt.js')}}"></script>
<script> 
    var debt = new debt(); 
    debt.datas={
        routes:{
          datatable:"{{route('debt_table')}}",
          insert:"{{route('debt_insert')}}",
          update:"{{route('debt_update')}}",
          delete:"{{route('debt_delete')}}",
        }
    }   
    debt.runJS();
</script>
@endsection