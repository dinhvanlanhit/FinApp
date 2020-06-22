@extends('AdminDesktops.layouts.layout')
@section('desktops')
<div class="row">
    <div class="col-sm-12 col-md-3 ">
        @include('AdminDesktops.fromControl.dateRange',
        [
          'daterange'=>'dashboard_daterange',
          'dateBegin'=>'dashboard_dateBegin',
          'dateEnd'=>'dashboard_dateEnd',
        ]
        )
    </div>
    <div class="col-sm-12 col-md-3 ">
      <div class="form-group">
        <input class="daterangepicker_label form-control text-center"  value="Tháng này" readonly/>
      </div>
  </div>
    
</div>
<div class="row">
  <div class="col-md-12">
    <div class="row">

        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Biểu Đồ Tổng Quan</h5>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body-dashboard">
        <div class="row">
          <div class="col-md-12">
            <div id="dashboard-chart-top" style="height:400px"></div>
            <!-- /.chart-responsive -->
          </div>
      
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Biểu Đồ Chi Riết</h5>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body-dashboard">
        <div class="row">
  
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-12 col-lg-6 col-md-3 ">
                @include('AdminDesktops.fromControl.dateRange',
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
<script src="{{asset('AdminDesktops/plugins/echarts/echarts-en.min.js')}}"></script>
<script src="{{asset('app/desktops/dashboard/dashboard.js')}}"></script>
<script> 
    var dashboard = new dashboard(); 
    dashboard.datas={
        routes:{
          dashboard:"{{route('getDashboard')}}",
          getCharDashboard:"{{route('getCharDashboard')}}",
        }
    }   
    dashboard.runJS();
</script>
@endsection