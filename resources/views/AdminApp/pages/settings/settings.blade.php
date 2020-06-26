@extends('AdminApp.layouts.layout')
@section('AdminApp')


        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link  active" href="#Setting" data-toggle="tab"> Hệ Thống </a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#Contact" data-toggle="tab"> Liên Hệ</a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#Theme" data-toggle="tab"> Giao Diện</a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#PayMent" data-toggle="tab">Thanh Toán</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="Setting">
                        <form id="x">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="company_name">Tên Hệ Thống</label>
                                                    <input type="text" value="{{$data->company_name}}" id="company_name" name="company_name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_name">Tiêu Đề</label>
                                                    <input type="text" value="{{$data->title}}" id="title" name="title" class="form-control">
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_name">Năm Thành Lập</label>
                                                    <input type="text" value="{{$data->date}}" id="date" name="date" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_name">Địa Chỉ</label>
                                                     <input type="text" value="{{$data->address}}" id="address" name="address" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_name">Email</label>
                                                    <input type="text" value="{{$data->email}}" id="email" name="email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_name">Mật Khẩu</label>
                                                    <input type="password" value="{{$data->password}}" id="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="text-center"> LOGO </h3>
                                            </div>
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                  <label for="changeAvatar">
                                                  <img class="img-responsive btn-block" id="user_avatar_profile" 
                                                  src="{{asset('SytemFinApp/logo/')}}/{{$data->icon}}" alt="User profile picture">
                                                  <input type="file" id="changeAvatar" class="d-none" name="avatar">
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="text-center"> ICON </h3>
                                            </div>
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                  <label for="changeAvatar">
                                                  <img class="img-responsive btn-block" id="user_avatar_profile" 
                                                  src="{{asset('SytemFinApp/logo/')}}/{{$data->icon}}" alt="User profile picture">
                                                  <input type="file" id="changeAvatar" class="d-none" name="avatar">
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="Contact">
                        <form id="">
         
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <a  href="{{route('admin_dashboard')}}" class="btn btn-danger btn-block float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>

                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                           
                            <button type="submit"  class="btn btn-success btn-block float-left"></i> Lưu</button>
                        </div>
                    </div>
                </div>

              </div>
        </div>


    
@endsection
@section('javascript')
<script src="{{asset('app/admin/setting/setting.js')}}"></script>
<script> 
    var setting = new setting(); 
    setting.datas={
        routes:{
          updatte:"{{route('admin_setting')}}",
        }
    }   
    setting.runJS();
</script>
@endsection