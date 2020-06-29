@extends('AdminApp.layouts.layout')
@section('AdminApp')

@endsection
@section('javascript')
<script src="{{asset('app/admin/contact/contact.js')}}"></script>
<script> 
    var contacts = new contacts(); 
    contacts.datas={
        routes:{
          datatable:"{{route('admin_contact_datatable')}}",
          delete:"{{route('admin_contact_delete')}}",
        }
    }   
    contacts.runJS();
</script>
@endsection