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
                <div class="col-md-5">
                  <div class="form-group">
                        <input class="form-control" id="search" name="search" placeholder="Từ khóa tìm kiếm ..."/>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control select2bs4" id="type" name="type">
                            <option value="">-- Chọn Trạng Thái -- </option> 
                            <option value="Đang Thực Hiện">Đang Thực Hiện</option>     
                            <option value="Chưa Làm Được">Chưa Làm Được</option> 
                            <option value="Đã Làm Được">Đã Làm Được</option> 
                    </select>
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
              <table class="table table-bordered row-border hover text-small" id="goals_dreams-table"></table>
          </div>
        </div>
        
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
    </div>
  </div>
@include('AdminDesktops.pages.goals_dreams.include')
@endsection
@section('javascript')

<script src="{{asset('app/desktops/goals_dreams/goals_dreams.js')}}"></script>
<script> 
    var goals_dreams = new goals_dreams(); 
    goals_dreams.datas={
        routes:{
          datatable:"{{route('goals_dreams_table')}}",
          insert:"{{route('goals_dreams_insert')}}",
          update:"{{route('goals_dreams_update')}}",
          delete:"{{route('goals_dreams_delete')}}",
        }
    }   
    goals_dreams.runJS();
</script>
@endsection