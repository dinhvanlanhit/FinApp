<!-- Dialog Basic -->
<div class="modal fade dialogbox" id="modal-logout" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông báo </h5>
            </div>
            <div class="modal-body">
                 Bạn có muốn đăng xuất không ?
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn btn-text-danger" data-dismiss="modal">NO</a>
                    <a href="{{route('logout')}}" class="btn btn-text-primary" >YES</a>
                </div>
            </div>
        </div>
    </div>
</div>