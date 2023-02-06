@extends('ClientDesktops.layouts.layout')
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
                    <div class="row">
                        <div class="col-md-12">
                            <label>Gói Sử Dụng</label>
                            <div class="form-group" >
                               <select class="form-control select2bs4" id="idUsePayment" name="idUsePayment">
                                <option value="">--Chọn gói--</option>
                                @foreach ($usepayments as $item)
                                    @if ($item->id!=1)
                                        <option 
                                        value="{{$item->id}}"
                                        data-numbermonth="{{$item->numberMonth}}"
                                        data-amount="{{$item->amount}}"
                                        data-note="{{$item->note}}"
                                        >{{$item->name}} | {{number_format($item->amount)}} VNĐ</option>
                                    @endif
                                @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Số Tiền Thanh Toán</label>
                                <input readonly class="form-control" id="amount" name="amount"/>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {!!setting()->content_banktransfer!!}
                        </div>
                    </div>
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
<script>
        $("#idUsePayment").on('change',function(){
			$('#amount').val(money_format($("#idUsePayment :selected").attr('data-amount'))+' VNĐ ');
		})
</script>
@endsection