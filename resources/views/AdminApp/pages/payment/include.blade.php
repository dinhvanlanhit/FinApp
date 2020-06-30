<div class="modal fade" id="modal-action" >
    
    <div class="modal-dialog" role="document">
        <form id="formAction">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal-action-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body card-body-dashboard">
            <div class="row">
                <div class="col-md-12">
                    <label>Gói Sử Dụng</label>
                    <div class="form-group" >
                       <select class="form-control select2bs4" id="idUsePayment" name="idUsePayment">
                        <option value="">--Chọn gói--</option>
                        @foreach ($usepayments as $item)
                            <option 
                            value="{{$item->id}}"
                            data-numbermonth="{{$item->numberMonth}}"
                            data-amount="{{$item->amount}}"
                            data-note="{{$item->note}}"
                            >{{$item->name}} | {{number_format($item->amount)}} VNĐ</option>
                        @endforeach
                       </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Số Tiền Thanh Toán</label>
                        <input class="form-control" id="amount" name="amount"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tháng Sử Dụng</label>
                        <input class="form-control" id="numberMonth" name="numberMonth"/>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Ghi Chú (Nếu có)</label>
                        <input class="form-control" id="note" name="note"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                            <label>Ngày Thanh Toán </label>
                            <div class="input-group">
                                <input type="text"  id="date" name="date" class="form-control text-center">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                    </div>
                </div>
             
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-success" data-action="insert" data-id="" data-url="" id="onSave">Lưu</button>
        </div>
    </div>
    </div>
</form>

</div>