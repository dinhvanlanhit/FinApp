@extends(templateAdminApp().'.layouts.layout')
@section('AdminApp')
<div class="row">
  <div class="col-md-12">
    <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
                <h5 id=""> 
                  {{$countMemberActive}} 
                </h5>
              <p>Hoạt Động</p>
            </div>
            <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="{{route('admin_users')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                <h5 id="">{{$countMemberLocked}}  </h5>

              <p>Đã Khóa</p>
            </div>
            <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="{{route('admin_users')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
                <h5 id=""> {{$countMemberPayfee}} </h5> 

              <p>Trả Phí</p>
            </div>
            <div class="icon">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <a href="{{route('admin_users')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h5 id="">{{$countMemberFree}}  </h5>
              <p>Miễn Phí</p>
            </div>
            <div class="icon">
                <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="{{route('admin_users')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
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
</div>
@endsection
@section('javascript')
<script src="{{asset(templateAdminApp().'/plugins/echarts/echarts-en.min.js')}}"></script>
<script src="{{asset('app/admin/dashboard/dashboard.js')}}"></script>
<script> 
    var dashboard = new dashboard(); 
    dashboard.datas={
        routes:{
          dashboard:"{{route('admin_getDashboard')}}",
          getCharDashboard:"{{route('admin_getCharDashboard')}}",
        }
    }   
    dashboard.runJS();
</script>
@endsection