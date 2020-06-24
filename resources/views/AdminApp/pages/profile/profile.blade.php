@extends('AdminApp.layouts.layout')
@section('AdminApp')

        <form id="formProfile">
            <div class="row">
                <div class="col-md-3">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                  
                      <div class="text-center">
                        <label for="changeAvatar">
                        <img class="img-responsive btn-block"   id="user_avatar_profile" 
                         @if (empty(Auth::user()->avatar))
                                src="{{asset('./data/default/profile-default.png')}}"    
                         @else
                            @if (file_exists('./data/users/users'.Auth::user()->id.'/'.Auth::user()->avatar))
                                src="{{asset('./data/users/users'.Auth::user()->id.'/'.Auth::user()->avatar)}}"
                            @else
                                    src="{{asset('./data/default/profile-default.png')}}" 
                            @endif
                        @endif
                        
                        alt="User profile picture">
                            </label>
                    </div>
                   
                    <h3 class="profile-username text-center full_name_show">{{Auth::user()->full_name}}</h3>
                      <p class="text-muted text-center full_email_show">{{Auth::user()->email}}</p>
                    <input type="file"  id="changeAvatar" class="d-none" name="avatar"/>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#userInfo" data-toggle="tab">Thông tin cá nhân</a></li>
                        <li class="nav-item"><a class="nav-link  " href="#userChanePass" data-toggle="tab">Thay đổi mật khẩu</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="userInfo">
                          <form class="form-horizontal">
                            <div class="form-group ">
                              <label for="full_name" class="col-form-label">Họ Và Tên</label>
                                <input type="text" class="form-control" value="{{$users->full_name}}" id="full_name" name="full_name" placeholder="Họ và tên ....">
                             
                            </div>
                            <div class="form-group">
                              <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="{{$users->email}}" name="email" placeholder="Email">
                              
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="col-form-label">Ngày Sinh</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" value="{{$users->birthday}}" placeholder="... ">
                                
                            </div>
                            <div class="form-group">
                              <label for="inputName2" class=" col-form-label">Giới Tính</label>
                              <div class="">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary3" value="1" {{$users->sex==1?'checked':''}} name="sex">
                                        <label for="radioPrimary3">
                                           Nam
                                        </label>
                                        
                                      </div>
                                    <div class="icheck-primary d-inline">
                                      <input type="radio" id="radioPrimary2"  value="0" {{$users->sex==0?'checked':''}} name="sex">
                                      <label for="radioPrimary2">
                                          Nữ
                                      </label>
                                    </div>
                                    
                                  </div>
                              </div>
                            </div>
                            <div class="form-group ">
                              <label for="introduce" class=" col-form-label">Giới Thiệu Bản Thân</label>
                             
                                <textarea class="form-control" id="introduce" name="introduce" placeholder="...">{!!$users->introduce!!}</textarea>
                             
                            </div>
                            <div class="form-group ">
                              <label for="address" class=" col-form-label">Địa chỉ</label>
                             
                                <input type="text" class="form-control" id="address" name="address_1" value="{{$users->address_1}}" placeholder="Địa chỉ ... ">
                             
                            </div>
                            <div class="form-group ">
                                <label for="phone_number" class=" col-form-label">Số Điện Thoại</label>
                              
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$users->phone_number}}" placeholder="Địa chỉ ... ">
                           
                            </div>
                            <div class="form-group ">
                                <label for="address" class=" col-form-label">Mối Quan Hệ</label>
                           
                                    <select name="user_type" class="form-control" >
                                            <option {{$users->user_type==0?'selected':''}}  value="0">Độc Thân</option>
                                            <option {{$users->user_type==1?'selected':''}}   value="1">Có Gia Đình</option>
                                    </select>
                               
                            </div>
                            <div class="form-group ">
                              <div class="">
                                  <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
                                <button type="submit" id="onSave" class="btn btn-danger">Lưu</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane" id="userChanePass">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="old_password" class="col-sm-2 col-form-label"> Nhập lại mật khẩu củ 
                                    <span class="text-danger old_password"></span>
                                </label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="old_password" name="old_password" placeholder="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="password1" class="col-sm-2 col-form-label"> Nhập mật khẩu mới
                                    <span class="text-danger old_password"></span>
                                </label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control"  id="password1" name="password1" >
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">
                                    Xác nhận lại mật khẩu mới
                                    <span class="text-danger old_password"></span>
                                </label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password2" name="password2" placeholder="...">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <a  href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
                                  <button type="submit" class="btn btn-danger">Lưu</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                        <!-- /.card-body -->
                       
                  </div>
                  <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
              </div>
        </form>

@endsection
@section('javascript')
<script src="{{asset('app/desktops/profile/profile.js')}}"></script>
<script> 
    var profile = new profile(); 
    profile.datas={
        birthday:"{{$users->birthday}}",
        routes:{
          profile:"{{route('admin_profile')}}",
          uploadFile:"{{route('admin_uploadFile')}}",
        }
    }   
    profile.runJS();
</script>
@endsection