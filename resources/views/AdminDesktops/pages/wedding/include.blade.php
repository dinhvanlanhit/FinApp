<div class="modal fade" id="modal-action" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-action-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Số tiền</label>
                        <input class="form-control" name="amount"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Ngày đi </label>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" value="" data-url="" id="onSave">Yes</button>
        </div>
      </div>
    </div>
  </div>