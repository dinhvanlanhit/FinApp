@extends('AdminDesktops.layouts.layout')
@section('desktops')
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card  ">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link  active" href="#Banktransfer" data-toggle="tab"> Chuyển Khoản</a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link " href="#Scratchcards" data-toggle="tab"> Thẻ Cào</a>
                </li> --}}
            </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="Banktransfer">
                    {!!setting()->content_banktransfer!!}
                </div>
                <div class="tab-pane " id="Scratchcards">
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-3"></div>
@endsection
@section('javascript')
@endsection