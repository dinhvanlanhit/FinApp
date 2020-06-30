function contact() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		var table = $("#contact-table").DataTable({
			serverSide: true,
			processing: true,
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
                        status: $("#status").val(),
                        search: $("#search").val(),
                        
					});
				}
			},
			order: [0, "desc"],
			columns: [
				{
				title: "#",
				data: "created_at",
				name: "created_at",
				className: "text-center",
					render: function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				}, 
				{
					title: "Họ Tên",
					data: "full_name",
					name: "full_name",
					className: "text-center",
				},
				{
					title: "Email",
					data: "email",
					name: "email",
					className: "text-center",
                }, 
                {
					title: "Số ĐT",
					data: "phone_number",
					name: "phone_number",
					className: "text-center",
				}, 
				{
					title: "Thông Điệp",
					data: "msg",
					name: "msg",
					className: "text-center",
				},
                {
					title: "Trạng Thái",
					data: "status_name",
					name: "status_name",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        if(row.status==0){
                            return '<b class="text-danger">'+data+'</b>';
                        }else{
                            return '<b class="text-success">'+data+'</b>';
                        }
					}
                }
                ,{
					title: "Ngày",
					data: "created_at",
					name: "created_at",
					className: "text-center",
                },
                {
					title: "Tác vụ",
					data: "created_at",
					name: "created_at",
					className: "text-center",
					render: function (data, type, row, meta) {
						return rederAction([{
							class: 'btn-delete',
							value: row.id,
							title: 'Xóa',
							icon: '',
							text: 'Xóa'
						}, {
							class: 'btn-status',
							value: row.id,
							title: 'Xử lý',
							icon: '',
                            text: 'Xử lý',
                            attr:'data-status="'+row.status+'"'
						}]);
					}
				}
			],
			drawCallback: function (settings) {
                buttonloading(".formSearch", false);
            }
		});
		$("#formSearch").on('submit', function (e) {
			e.preventDefault();
			buttonloading(".formSearch", true);
			table.ajax.reload();
		})
		$(document).delegate(".btn-delete", "click", function () {
			var id = $(this).val();
			$('#modal-text-delete').text("Bạn có muốn xóa không ?");
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
		});
		$("#status").on("change", function (e) {
			table.ajax.reload();
		});
		$("#onDelete").on("click", function (e) {
			var id = $(this).val();
			e.preventDefault(e);
			buttonloading('#onDelete', true);
			var result = _AjaxDelete({
				id: id
			}, datas.routes.delete);
			if (result) {
				table.ajax.reload();
				$("#modal-delete").modal('hide');
				buttonloading('#onDelete', false);
			}
        });
        $(document).delegate(".btn-status", "click", function () {
            var id = $(this).val();
            var status =  $(this).attr('data-status');
			$('#modal-text-status').text("Bạn có muốn xác nhận không ?");
            $("#onStatus").attr('value', id);
            $("#onStatus").attr('data-status',status);
			$("#modal-status").modal('show');
        });
        $("#onStatus").on('click',function(){
            $.ajax({
                url:datas.routes.status,
                data:{
                    id:$(this).attr('value'),
                    status:$(this).attr('data-status')
                },
                type:'POST',
                dataType:'JSON',
                success:function(data){
					table.ajax.reload();
					$("#countContact").text(data.data);
					$("#modal-status").modal('hide');
					Toast.fire({
						icon: data.icon,
						title: data.messages
					});
                },error:function(error){
                    console.log(error);
                }   
            })
        })
	}
}