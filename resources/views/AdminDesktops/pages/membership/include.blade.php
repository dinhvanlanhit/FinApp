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
                        <div class="form-group">
                            <label>Họ và Tên </label>
                            <input class="form-control" id="full_name" name="full_name"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Tên Đăng Nhập</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"> {{Auth::user()->idKey}}_</span>
                            </div>
                            <input class="form-control" id="name" name="name" placeholder="Tên đăng nhập"/>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mật Khẩu <small class="text-danger"><span id="text-password">(Không nhập mặt định là : 12345)</span></small></label>
                            <input class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi Chú   (Nếu có)  </label>
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