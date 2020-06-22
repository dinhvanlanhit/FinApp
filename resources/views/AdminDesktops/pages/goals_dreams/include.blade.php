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
                            <label>Mục Tiêu </label>
                            <input class="form-control" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Trạng Thái </label>
                            <select class="form-control select2bs4" id="typeInput" name="typeInput">
                                    <option value="Đang Thực Hiện">Đang Thực Hiện</option>     
                                    <option value="Chưa Làm Được">Chưa Làm Được</option> 
                                    <option value="Đã Làm Được">Đã Làm Được</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi Chú   (Nếu có)  </label>
                            <input class="form-control" id="note" name="note"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                                <label>Ngày Bắt Đầu và Ngày Kết Thúc </label>
                                <div class="input-group">
                                    <input type="text"  id="dateBegin" name="dateBegin" class="form-control text-center">
                                    <div class="input-group-prepend" >
                                        <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text"  id="dateEnd" name="dateEnd" class="form-control text-center">
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