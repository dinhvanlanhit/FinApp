@extends('ClientDesktops.layouts.layout')
@section('desktops')
<form id="formExport">
<div class="row">
    <div class="col-sm-12 col-md-3 ">
        @include('ClientDesktops.fromControl.dateRange',
        [
          'daterange'=>'dashboard_daterange',
          'dateBegin'=>'dashboard_dateBegin',
          'dateEnd'=>'dashboard_dateEnd',
        ]
        )
    </div>
    <div class="col-sm-12 col-md-3 ">
      <div class="form-group">
        <input class="daterangepicker_label form-control text-center" name="label" value="Tháng này" readonly/>
      </div>
  </div>
  <div class="col-sm-12 col-md-3 ">
    <div class="form-group">
      <button type="submit" class="btn btn-success" id="export-excel">Xuất Excel</button>
    </div>
  </div>
</div>
</form>
<div class="row">
  <div class="col-md-12">
    <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-3 ">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
                <h5 id="sumEvent"> 
                  {{-- {{number_format($sumEvent)}}  --}}
                  VNĐ</h5>

              <p>Sự Kiện</p>
            </div>
            <div class="icon">
                <i class="fa fa-umbrella" aria-hidden="true"></i>
            </div>
            <a href="{{route('event')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-sm-12 col-md-6 col-lg-3 ">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                <h5 id="sumShopping"> VNĐ</h5>

              <p>Mua Sắm</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </div>
            <a href="{{route('shopping')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       <div class="col-sm-12 col-md-6 col-lg-3 ">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
                <h5 id="sumCost"> VNĐ</h5> 

              <p>Chi Tiêu</p>
            </div>
            <div class="icon">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <a href="{{route('cost')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-sm-12 col-md-6 col-lg-3 ">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h5 id="sumSalary"> VNĐ</h5>
              <p>Thu Nhập</p>
            </div>
            <div class="icon">
                <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="{{route('salary')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="far fa-building"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b> Đầu Tư </b></span>
            <span class="info-box-number" id="sumInvest"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-area-chart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b> Cho Vay </b></span>
            <span class="info-box-number" id="sumLendloan"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fa fa-university"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b> Khoản Nợ </b></span>
            <span class="info-box-number" id="sumDebt" ></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="far  fa-hdd-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b> Tài Sản </b></span>
            <span class="info-box-number" id="sumAsset"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  </div>
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h3 class="card-title">
          <i class="far fa-calendar-alt"></i>
          Lịch
        </h3>
        <div class="card-tools">
          <!-- button with a dropdown -->
          <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body pt-2">
        <div id="calendar"  style="width: 100%;"></div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Biểu Đồ Tổng Quan</h5>
      </div>
      <div class="card-body-dashboard">
        <div class="row">
          <div class="col-md-12">
            <div id="dashboard-chart-top" style="height:400px"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Biểu Đồ Chi Tiết</h5>
      </div>
      <div class="card-body-dashboard">
        <div class="row">
  
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-12 col-lg-6 col-md-3 ">
                @include('ClientDesktops.fromControl.dateRange',
                [
                  'daterange'=>'Chart_daterange',
                  'dateBegin'=>'Chart_dateBegin',
                  'dateEnd'=>'Chart_dateEnd',
                ]
                )
              </div>
              <div class="col-sm-12 col-lg-6 col-md-3 ">
                <div class="form-group">
                  <select id="TypeDashboard" class="form-control select2bs4" style="width: 100%;">
                    <option value="event"> Sự Kiện</option>
                    <option value="shopping"> Mua Sắm</option>
                    <option value="cost"> Chi Tiêu</option>
                    <option value="salary"> Thu Nhập</option>
                  </select>
              </div>
              </div>
              <div class="col-md-12">
                <div id="dashboard-chart" style="height:500px"></div>
                <!-- /.chart-responsive -->
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('ClientDesktops/plugins/echarts/echarts-en.min.js')}}"></script>
<script src="{{asset('app/desktops/dashboard/dashboard.js')}}"></script>
<script> 
    var dashboard = new dashboard(); 
    dashboard.datas={
        routes:{
          export:"{{route('export')}}",
          dashboard:"{{route('getDashboard')}}",
          getCharDashboard:"{{route('getCharDashboard')}}",
        }
    }   
    dashboard.runJS();
</script>
@endsection