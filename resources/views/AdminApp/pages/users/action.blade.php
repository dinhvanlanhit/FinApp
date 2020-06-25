@extends('AdminApp.layouts.layout') @section('AdminApp')
<form id="formUsers">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item"><a class="nav-link active" href="#userInfo" data-toggle="tab">Thông tin cá nhân</a>
						</li>
					</ul>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="userInfo">
							<form class="form-horizontal">
								<div class="form-group ">
									<label for="full_name" class="col-form-label">Họ Và Tên</label>
									<input type="text" class="form-control" value="{{$users->full_name}}" id="full_name" name="full_name" placeholder="Họ và tên ....">
								</div>
								<div class="form-group">
									<label for="email" class="col-form-label">Email <span class="error-email text-danger"></span></label>
									<input type="email" class="form-control" id="email" value="{{$users->email}}" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="password" class="col-form-label">Mật khẩu :
										<span class="text-danger">{{$action=='update'?'(Nhập mật khẩu nếu muốn thay đổi)':'(Để rổng mặt định sẽ là 12345)'}}</span>
									</label>
									<input type="text" class="form-control" id="password" value="" name="password" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="status" class=" col-form-label">Trạng Thái Sửa Dụng</label>
									<select class="form-control select2bs4" style="width: 100%;" id="status_payment" name="status_payment">
										<option value="1" {{$users->status_payment_name==1?'selected':''}}>-- Trả Phí --</option>
										<option value="0" {{$users->status_payment_name==0?'selected':''}}>-- Miễn Phí --</option>
									</select>
								</div>
								
								<div class="form-group">
									<label for="status" class=" col-form-label">Trạng Thái</label>
									<select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
										<option value="1" {{$users->status==1?'selected':''}}>-- Khóa --</option>
										<option value="0" {{$users->status==0?'selected':''}}>-- Mở --</option>
									</select>
								</div>

								<div class="form-group ">
									<label for="date" class=" col-form-label">Ngày Đăng Ký</label>
									<input type="text" readonly class="form-control" id="date" name="date" value="{{$users->date}}" placeholder="Ngày đăng ký sử dụng">
								</div>
								<br>
								<div class="form-group ">
									<div class=""> 
										<a href="{{route('admin_users')}}" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
										<a href="{{route('admin_users_insert')}}" class="btn btn-info float-feft"><i class="fas fa-long-arrow-alt-left"></i> Thêm mới</a>
										<button type="submit"  class="btn btn-success onSave">Lưu</button>
									</div>

								</div>
							
								<div class="form-group">
									<label for="birthday" class="col-form-label">Ngày Sinh</label>
									<input type="text"  class="form-control" id="birthday" name="birthday" value="{{$users->birthday}}" placeholder="... ">
								</div>
								<div class="form-group">
									<label for="inputName2" class=" col-form-label">Giới Tính</label>
									<div class="">
										<div class="form-group clearfix">
											<div class="icheck-primary d-inline">
												<input type="radio" id="radioPrimary3" value="1" {{$users->sex==1?'checked':''}} name="sex">
												<label for="radioPrimary3">Nam</label>
											</div>
											<div class="icheck-primary d-inline">
												<input type="radio" id="radioPrimary2" value="0" {{$users->sex==0?'checked':''}} name="sex">
												<label for="radioPrimary2">Nữ</label>
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
									<select name="user_type" class="form-control select2bs4">
										<option {{$users->user_type==0?'selected':''}} value="0">Độc Thân</option>
										<option {{$users->user_type==1?'selected':''}} value="1">Có Gia Đình</option>
									</select>
								</div>
								<br>
								<div class="form-group ">
									<div class="pull-left"> 
										<a href="{{route('admin_users')}}" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
										<a href="{{route('admin_users_insert')}}" class="btn btn-info float-feft"><i class="fas fa-long-arrow-alt-left"></i> Thêm mới</a>
										<button type="submit"  class="btn btn-success onSave">Lưu</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.card-body -->
				<!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
</form>@endsection @section('javascript')
<script src="{{asset('app/admin/users/action.js')}}"></script>
<script>
	var users = new users(); 
	    users.datas={
		  birthday:"{{$users->birthday}}",
		  date:"{{$users->date}}",
		  id:"{{$users->id}}",
          action:"{{$action}}",
	        routes:{
	          users:"{{route('admin_users')}}",
	          save:"{{$action=='update'?route('admin_users_update'):route('admin_users_insert')}}",
	        }
	    }   
	    users.runJS();
</script>@endsection