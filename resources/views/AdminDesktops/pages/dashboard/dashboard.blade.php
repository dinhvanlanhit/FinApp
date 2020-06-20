@extends('AdminDesktops.layouts.layout')
@section('desktops')

<div class="row">
    <div class="col-md-3 col-6">
        @include('AdminDesktops.fromControl.dateRange',
        [
          'daterange'=>'dashboard_daterange',
          'dateBegin'=>'dashboard_dateBegin',
          'dateEnd'=>'dashboard_dateEnd',
        ]
        )
    </div>
</div>
<div class="row">

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
            <h5 id="sumEvent"> {{number_format($sumEvent)}} VNĐ</h5>

          <p>Sự Kiện</p>
        </div>
        <div class="icon">
            <i class="fa fa-umbrella" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
            <h5 id="sumShopping">{{number_format($sumShopping)}} VNĐ</h5>

          <p>Mua Sắm</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
            <h5 id="sumCost">{{number_format($sumCost)}} VNĐ</h5> 

          <p>Chi Tiêu</p>
        </div>
        <div class="icon">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h5 id="sumSalary">{{number_format($sumSalary)}} VNĐ</h5>
          <p>Thu Nhập</p>
        </div>
        <div class="icon">
            <i class="fa fa-money" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Biểu Đồ</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>

         
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-3 col-6">
              @include('AdminDesktops.fromControl.dateRange',
               [
                'daterange'=>'Chart_daterange',
                'dateBegin'=>'Chart_dateBegin',
                'dateEnd'=>'Chart_dateEnd',
              ]
              )
          </div>
          <div class="col-md-3 col-6">
            <div class="form-group">
              <select id="TypeDashboard" class="form-control">
                <option value="event"> Sự Kiện</option>
                <option value="shopping"> Mua Sắm</option>
                <option value="cost"> Chi Tiêu</option>
                <option value="salary"> Thu Nhập</option>
              </select>
           </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-12">
            <div id="dashboard-chart" style="height:350px"></div>
            <!-- /.chart-responsive -->
          </div>
      
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- ./card-body -->
   
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('javascript')
<script src="{{asset('AdminDesktops/plugins/echarts/echarts-en.min.js')}}"></script>
<script src="{{asset('app/desktops/dashboard/dashboard.js')}}"></script>
<script> 
    var dashboard = new dashboard(); 
    dashboard.datas={
        routes:{
          dashboard:"{{route('dashboard')}}",
          getCharEvent:"{{route('getCharEvent')}}",
        }
    }   
    dashboard.runJS();
</script>
@endsection