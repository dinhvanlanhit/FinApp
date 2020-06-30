@extends('AdminApp.layouts.layout')
@section('AdminApp')
<form id="formSetting">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link  active" href="#Setting" data-toggle="tab"> Hệ Thống </a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#Contact" data-toggle="tab"> Liên Hệ</a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#PayMent" data-toggle="tab">Thanh Toán</a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#Theme" data-toggle="tab"> Giao Diện</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body card-body-dashboard">
                <div class="tab-content">
                    <div class="tab-pane active" id="Setting">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body card-body-dashboard">
                                                <div class="form-group">
                                                    <label for="company_name">Tên Hệ Thống</label>
                                                    <input type="text" value="{{$data->company_name}}" id="company_name" name="company_name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Tiêu Đề</label>
                                                    <input type="text" value="{{$data->title}}" id="title" name="title" class="form-control">
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Năm Thành Lập</label>
                                                    <input type="text" value="{{$data->date}}" id="date" name="date" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Địa Chỉ</label>
                                                     <input type="text" value="{{$data->address}}" id="address" name="address" class="form-control">
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                      <h3 class="card-title">Thiết Lập Email </h3>
                                      
                                                      <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                      </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body card-body-dashboard">
                                                         <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" value="{{$data->email}}" id="email" name="email" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password"> Mật Khẩu </label>
                                                            <input type="password" value="{{$data->password}}" id="password" name="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email_receive">Email nhận</label>
                                                            <input type="text" value="{{$data->email_receive}}" id="email_receive" name="email_receive" class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- /.footer -->
                                                  </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                      <h3 class="card-title">Google reCAPTCHA </h3>
                                      
                                                      <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                      </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body card-body-dashboard">
                                                        <div class="form-group">
                                                            <label for="GOOGLE_RECAPTCHA_KEY">KEY</label>
                                                            <input type="text" value="{{$data->GOOGLE_RECAPTCHA_KEY}}" id="GOOGLE_RECAPTCHA_KEY" name="GOOGLE_RECAPTCHA_KEY" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="GOOGLE_RECAPTCHA_SECRET">SECRET</label>
                                                            <input type="text" value="{{$data->GOOGLE_RECAPTCHA_SECRET}}" id="GOOGLE_RECAPTCHA_SECRET" name="GOOGLE_RECAPTCHA_SECRET" class="form-control">
                                                        </div>
                                                    
                                                    </div>
                                                    <!-- /.footer -->
                                                  </div>
                                                    <div class="form-group">
                                                        <a  href="{{route('admin_dashboard')}}" class="btn btn-danger  float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
                                                        <button type="submit"   class="btn btn-success float-fight onSave">Lưu</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="text-center"> LOGO </h3>
                                            </div>
                                            <div class="card-body card-body-dashboard box-profile">
                                                <div class="text-center">
                                                  <label for="changeLogo">
                                                  <img class="img-responsive btn-block" id="img_logo" 
                                                  src="{{asset('SytemFinApp/logo/')}}/{{$data->logo}}" alt="User profile picture">
                                                  <input type="file" id="changeLogo" class="d-none" name="logo">
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="text-center"> ICON </h3>
                                            </div>
                                            <div class="card-body card-body-dashboard box-profile">
                                                <div class="text-center">
                                                  <label for="changeIcon">
                                                  <img class="img-responsive btn-block" id="img_icon" 
                                                  src="{{asset('SytemFinApp/icon/')}}/{{$data->icon}}" alt="User profile picture">
                                                  <input type="file" id="changeIcon" class="d-none" name="icon">
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                    </div>
                    <div class="tab-pane " id="Contact">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="text-center">  Thông Tin Liên Hệ </h6>
                                    </div>
                                    <div class="card-body card-body-dashboard">
                                        <div class="form-group">
                                            <textarea id="content_contact"  class="form-control">
                                                {{$data->content_contact}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label> Code Google Map  </label>
                                            <textarea id="googleMap" rows="10" name="googleMap" class="form-control">
                                                {{$data->googleMap}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Chat Facebook JavaScript SDK  </label>
                                            <textarea id="code_chat_facebook" rows="10" name="code_chat_facebook"  class="form-control">
                                                {{$data->code_chat_facebook}}
                                            </textarea>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <a  href="{{route('admin_dashboard')}}" class="btn btn-danger  float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
                                            <button type="submit"   class="btn btn-success float-fight onSave">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="text-center">  Mạng Xã Hội </h6>
                                    </div>
                                    <div class="card-body card-body-dashboard">
                                        <div class="form-group">
                                            <label for="facebook_url">Facebook</label>
                                            <input type="text" class="form-control" id="facebook_url" value="{{$data->facebook_url}}" name="facebook_url" placeholder="Url ... ">
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter_url">Twitter</label>
                                            <input type="text" class="form-control" id="twitter_url" value="{{$data->twitter_url}}" name="twitter_url" placeholder="Url ... ">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram_url">Instagram</label>
                                            <input type="text" class="form-control" id="instagram_url" value="{{$data->instagram_url}}" name="instagram_url" placeholder="Url ... ">
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin_url">Linkedin</label>
                                            <input type="text" class="form-control" id="linkedin_url" value="{{$data->linkedin_url}}" name="linkedin_url" placeholder="Url ... ">
                                        </div>
                                        <div class="form-group">
                                            <label for="vk_url">VK</label>
                                            <input type="text" class="form-control" id="vk_url" value="{{$data->vk_url}}" name="vk_url" placeholder="Url ... ">
                                        </div>
                                        <div class="form-group">
                                            <label for="telegram_url">Telegram</label>
                                            <input type="text" class="form-control" id="telegram_url" value="{{$data->telegram_url}}" name="telegram_url" placeholder="Url ... ">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube_url">YouTube</label>
                                            <input type="text" class="form-control" id="youtube_url" value="{{$data->youtube_url}}" name="youtube_url" placeholder="Url ... ">
                                        </div>

                                        
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane " id="PayMent">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="text-center">  Thông Tin Thanh Toán </h6>
                                    </div>
                                    <div class="card-body card-body-dashboard">
                                        <div class="form-group">
                                            <textarea id="content_banktransfer"  class="form-control">
                                                    {{$data->content_banktransfer}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <a  href="{{route('admin_dashboard')}}" class="btn btn-danger  float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
                                            <button type="submit"   class="btn btn-success float-fight onSave">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        
                    </div>
                   
                </div>
               
            </div>
            
        </div>
</form>
@endsection
@section('javascript')
<script src="{{asset('app/admin/setting/setting.js')}}"></script>
<script> 
    var settings = new settings(); 
    settings.datas={
        routes:{
          update:"{{route('admin_setting')}}",
          upload:"{{route('admin_setting_upload')}}",
        }
    }   
    settings.runJS();
</script>
@endsection