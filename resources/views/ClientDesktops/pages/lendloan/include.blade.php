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
                        <div class="form-group" >
                            
                        </div>
                        <div class="form-group">
                            <label>Đơn Vị Vay</label>
                            <input class="form-control" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label>Ngày Sinh</label>
                            <div class="input-group">
                                <input type="text"  id="birthday" name="birthday" class="form-control text-center">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <select  class="form-control select2bs4" style="width: 100%;" id="sex" name="sex">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            <select>
                          
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" id="address" name="address"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Khoản vay</label>
                            <input class="form-control" id="amount" name="amount"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kỳ Hạn</label>
                            <input class="form-control" value="0" type="number" id="tenor" name="tenor"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Trạng Thái</label>
                            <select class="form-control select2bs4" id="status" name="status">
                                <option value="Đang Nợ">-- Đang Nợ -- </option>   
                                <option value="Hết Nợ">-- Hết Nợ -- </option>    
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Thuế Chấp (Nếu có)</label>
                            <input class="form-control" id="mortgage" name="mortgage"/>
                        </div>
                    </div>
                    
               
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lãi Suất / Tháng / Năm</label>
                            <input class="form-control" id="interest_rate" name="interest_rate"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <label>Ngày Vay & Ngày Hết Hạn </label>
                            <div class="input-group">
                                <input type="text"  id="date" name="date" class="form-control text-center">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text"  id="expiration_date" name="expiration_date" class="form-control text-center">
                            </div>
                    
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi Chú     </label>
                            <input class="form-control" id="note" name="note"/>
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