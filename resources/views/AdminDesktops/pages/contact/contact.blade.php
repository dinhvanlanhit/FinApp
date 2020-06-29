@extends('AdminDesktops.layouts.layout') @section('desktops')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      LIÊN HỆ CHÚNG TÔI
    </h3>
	</div>
	<div class="card-body card-body card-body-dashboard">
    @if (setting()->content_contact!=NULL) {!!setting()->content_contact!!} @endif
		<form id="formContact">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="full_name">Tên</label>
						<input type="text" class="form-control" value="{{Auth::user()->full_name}}" id="full_name" name="full_name" required placeholder="Tên">
					</div>
					<div class="form-group">
						<label for="email">Địa chỉ Email</label>
						<input type="email" class="form-control" value="{{Auth::user()->email}}" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<label for="phone_number">Số ĐT</label>
						<input type="text" class="form-control" value="{{Auth::user()->phone_number}}" id="phone_number" name="phone_number"  placeholder="Số ĐT">
					</div>
					<div class="form-group">
						<label for="msg">Thông Điệp</label>
						<textarea class="form-control" rows="4" id="msg" name="msg" placeholder="Thông điệp" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Xác nhận</label>
            <div class="g-recaptcha" data-sitekey="{{setting()->GOOGLE_RECAPTCHA_KEY}}" ></div>
            <b><span class="text-danger" id="recaptcha-msg"></span></b>
          </div>
					<div class="form-group "> <a href="{{route('dashboard')}}/" class="btn btn-danger float-feft"><i class="fas fa-long-arrow-alt-left"></i> Quay lại</a>
						<button type="submit" class="btn btn-success" id="onSend"> Gửi </button>
					</div>
				</div>
				<div class="col-md-4">
          @if (setting()->googleMap!=NULL) {!!setting()->googleMap!!} @endif
        
          <div class="form-group">
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Địa Chỉ <a class="float-right">{{setting()->address}}</a></b> 
              </li>
              <li class="list-group-item">
                <b>Số ĐT <a class="float-right">{{setting()->phone_number}}</a></b> 
              </li>
              <li class="list-group-item">
                <b>Email <a class="float-right">{{setting()->email}}</a></b> 
              </li>
            </ul>
          </div>
          <div class="col-sm-12 col-xs-12 contact-social text-center">
            <ul>
              <li> <a class="facebook" href="{{setting()->facebook_url}}" target="_blank"><i class="fab fa-facebook"></i></a>
              </li>
              <!--if twitter url exists-->
              <li> <a class="twitter" href="{{setting()->twitter_url}}" target="_blank"><i class="fab fa-twitter"></i></a>
              </li>
              <!--if pinterest url exists-->
              <li> <a class="pinterest" href="{{setting()->pinterest_url}}" target="_blank"><i class="fab fa-pinterest"></i></a>
              </li>
              <!--if instagram url exists-->
              <li> <a class="instagram" href="{{setting()->instagram_url}}" target="_blank"><i class="fab fa-instagram"></i></a>
              </li>
              <!--if linkedin url exists-->
              <li> <a class="linkedin" href="{{setting()->linkedin_url}}" target="_blank"><i class="fab fa-linkedin"></i></a>
              </li>
              <!--if vk url exists-->
              <li> <a class="vk" href="{{setting()->vk_url}}" target="_blank"><i class="fab fa-vk"></i></a>
              </li>
            </ul>
          </div>
				
				</div>
			</div>
		</form>
	</div>
</div>@endsection @section('javascript')
@if (setting()->GOOGLE_RECAPTCHA_KEY&&setting()->GOOGLE_RECAPTCHA_SECRET)
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endif
<script src="{{asset('app/desktops/contact/contact.js')}}"></script>
<script>
	var contact = new contact(); 
	    contact.datas={
	        routes:{
            contact:"{{route('contact')}}",
	          send:"{{route('contact_send')}}",
	        }
	    }   
	    contact.runJS();
</script>@endsection