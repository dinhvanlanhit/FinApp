<p><b>Email : {{$email}} </b></p>
<p><b>Họ Và Tên : {{$full_name}} </b></p>
@isset($phone_number)
    @empty(!$phone_number)
    <p><b>Số ĐT : {{$phone_number}}</b> </p>
    @endempty
@endisset
@isset($msg)
<p><b>Thông Điệp : </b> <br> {{$msg}} </b> </p>
@endisset

