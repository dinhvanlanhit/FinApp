function wedding(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
        var table = $("#wedding-table").DataTable({
            serverSide: true,
            processing:  true,
            paging: true,
            lengthChange: true,
            searching: false,
            ordering: true,
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: datas.routes.datatable,
                type: "GET",
                data: function (d) {
                    return $.extend({}, d, {
                        dateBegin: $("#dateBegin").val(),
                        dateEnd: $("#dateEnd").val(),
                        search: $("#search").val(),
                    });
                }
            },
            order: [5, "desc"],
            columns: [
                {
                    title:"#",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    title:"Tên",
                    data: "name",
                    name: "name",
                    className: "text-center",
                   
                },
                {
                    title:"Địa chỉ",
                    data: "address",
                    name: "address",
                    className: "text-center",
                   
                },
                {
                    title:"Số tiền",
                    data: "amount",
                    name: "amount",
                    className: "text-center",
                   
                },
                {
                    title:"Ngày",
                    data: "date",
                    name: "date",
                    className: "text-center",
                   
                },
                {
                    title:"Tác vụ",
                    data: "created_at",
                    name: "created_at",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                       var html = '<button class="btn btn-danger btn-delete btn-xs">Xóa</button>&nbsp;&nbsp;';
                          html += '<button class="btn btn-success btn-update btn-xs">Sửa</button>';
                       return '<div class="form-group">'+html+'</div>';
                    }
                   
                },
            ]

        });
        $("#wedding-table").on("click", "tr td .btn-delete", function () {
            var data = table.row($(this).parents("tr")).data();
            $('#modal-text-delete').text("Bạn có muốn xóa không ?");
            $("#onDelete").attr('value',data.id);
            $("#modal-delete").modal('show');
        });
        $("#wedding-table").on("click", "tr td .btn-update", function () {
            var data = table.row($(this).parents("tr")).data();
            $('#modal-action-title').text("Chỉnh sửa");
            $("#onSave").attr('value',data.id);
            $("#modal-action").modal('show');
        });

        $("#btn-insert").on("click",function (){
            $('#modal-action-title').text("Thêm mới");
            $("#onSave").attr('data-url',datas.routes.insert);
            $("#modal-action").modal('show');
        });
        $("#onDelete").on("click",function(e){
            var id = $(this).val();
     
            e.preventDefault(e);
            var result = _AjaxDelete({id:id},datas.routes.delete);
            if(result){
                table.ajax.reload();
                $("#modal-delete").modal('hide');
            }
            
        });
        $("#formSearch").on('submit',function(e){
            e.preventDefault();
            table.ajax.reload();
        })
    }
}