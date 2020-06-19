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
            <div class="modal-body">
                
   
                        <div class="form-group">
                            <label>Tên sản phẩm </label>
                            <input class="form-control" id="name" name="name"/>
                        </div>
                        <div class="form-group">
                            <label>Giá tiền</label>
                            <input class="form-control" id="amount" name="amount"/>
                        </div>
             
                   
                        <div class="form-group">
                            <label>Số tháng trả</label>
                            <input class="form-control" type="number" id="number_months" name="number_months"/>
                        </div>
                        <div class="form-group">
                            <label>Số tiền trả hàng tháng</label>
                            <input class="form-control" type="text" id="monthly_amount_to_pay" name="monthly_amount_to_pay"/>
                        </div>
                        <div class="form-group">
                            <label>Số tháng đã trả</label>
                            <input class="form-control" type="number" id="remaining_month" name="remaining_month"/>
                        </div>
                       
                        <div class="form-group">
                            <label>Số tiền trả trước</label>
                            <input class="form-control" type="text" id="prepay" name="prepay"/>
                        </div>
                   
                   
                   
                        
                  
                        <div class="form-group"> 
                            <label>Ngày mua </label>
                            <div class="input-group">
                                <input type="text"  id="date" name="date" class="form-control text-center">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                    
                        </div>
                        <div class="form-group"> 
                            <label>Ngày hết Hạn </label>
                            <div class="input-group">
                                <input type="text"  id="expiration_date" name="expiration_date" class="form-control text-center">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
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