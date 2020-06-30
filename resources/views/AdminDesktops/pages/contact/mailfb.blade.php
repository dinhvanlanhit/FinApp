<p><b>Email : {{$email}} </b></p>
<p><b>Họ Và Tên : {{$full_name}} </b></p>
@empty(!$phone_number)
<p><b>Số ĐT : {{$phone_number}}</b> </p>
@endempty
<p><b>Thông Điệp : </b> <br> {{$msg}} </b> </p>
