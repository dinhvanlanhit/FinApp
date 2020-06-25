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
                <div class="form-group" >
                      <select class="form-control select2bs4" style="width: 100%;" id="idTypeEvent" name="idTypeEvent">
                        <option value="">Tất Cả</option>    
                        @foreach ($typeevent as $item)
                            <option value="{{$item->id}}">{{$item->type_name}}</option>                      
                        @endforeach
                      </select>
                </div>
                <div class="form-group" >
                  <select class="form-control select2bs4" style="width: 100%;" id="idGroupMyEvent" name="idGroupMyEvent">
                    <option value="">Tất Cả</option>    
                    @foreach ($groupmyevent as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>                      
                    @endforeach
                  </select>
                </div>

              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
                </div>
                @include('AdminDesktops.fromControl.dateRange')
              </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block formSearch">Tìm kiếm</button>
                  </div>
                  <div class="form-group">
                    <button type="button"  class="btn btn-success btn-block" id="btn-insert">Thêm mới</button>
                   </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block formSearch">Nhập Excel</button>
                  </div>
                  <div class="form-group">
                    <button type="button"  class="btn btn-success btn-block" id="btn-insert">Xuất Excel</button>
                   </div>
                </div>
              
            </div>
        </form>
        <div class="row">
          <div class="col-md-12">
              <table class="table table-bordered row-border hover" id="myevent-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('AdminDesktops.pages.myevent.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/myevent/myevent.js')}}"></script>
<script> 
    var myevent = new myevent(); 
    myevent.datas={
        routes:{
          datatable:"{{route('myevent_table')}}",
          insert:"{{route('myevent_insert')}}",
          update:"{{route('myevent_update')}}",
          delete:"{{route('myevent_delete')}}",
        }
    }   
    myevent.runJS();
</script>
@endsection