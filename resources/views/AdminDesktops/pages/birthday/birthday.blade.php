@extends('AdminDesktops.layouts.layout')
@section('desktops')

@endsection
@section('javascript')
<script src="{{asset('app/desktops/birthday/birthday.js')}}"></script>
<script> 
    var birthday = new birthday(); 
    birthday.datas={
        routes:{

        }
    }   
    birthday.runJS();
</script>
@endsection