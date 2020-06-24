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
                        <label>Loại Tài Sản </label>
                        <div class="form-group" >
                              <select class="form-control select2bs4" style="width: 100%;" id="idTypeAssetInput" name="idTypeAssetInput">
                                <option value="">--Chọn tài sản--</option>    
                                @foreach ($typeasset as $item)
                                    <option value="{{$item->id}}">{{$item->type_name}}</option>                      
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên Tài Sản </label>
                            <input class="form-control" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Trị Giá </label>
                            <input class="form-control" id="amount" name="amount"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa Chỉ (Nếu có) </label>
                            <input class="form-control" id="address" name="address"/>
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