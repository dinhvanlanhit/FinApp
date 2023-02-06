function membership(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
		var table = $("#membership-table").DataTable({
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
						dateBegin: $("#dateBegin").val(),
						dateEnd: $("#dateEnd").val(),
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
					title: "Họ Và Tên",
					data: "full_name",
					name: "full_name",
					className: "text-center",
                },
                {
					title: "Tên Đăng Nhập",
					data: "username",
					name: "username",
					className: "text-center",
					
				},
				{
					title: "Ghi Chú",
					data: "note",
					name: "note",
					className: "text-center",
                },
                {
					title: "Ngày Cập Nhật",
					data: "updated_at",
					name: "updated_at",
					className: "text-center",
                }
                ,{
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
							class: 'btn-update',
							value: row.id,
							title: 'Sửa',
							icon: '',
							text: 'Sửa'
						},
						{
							class: 'btn-permission text-info',
							value: row.id,
							title: 'Phân Quyền',
							icon: '',
							text: 'Phân Quyền'
						}
						// permission
					]);
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
		});
		$(document).delegate(".btn-delete", "click", function () {
			var id = $(this).val();
			$('#modal-text-delete').text("Bạn có muốn xóa không ?");
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
		});
		$(document).delegate(".btn-permission", "click", function () {
			var id = $(this).val();
			$.ajax({
                url: datas.routes.permission+'/'+id,
                type: 'GET',
                dataType: 'html',
                success: function (data) {
                    $('#html-permission').html(data);
                    $("#modal-permission").modal('show');
                }, error: function (error) {
                    console.log(error);
                }
            });
		});
		$(document).delegate(".btn-update", "click", function () {
			var id = $(this).val();
			var elementbtn = $(this);
			
			$('#modal-action-title').text("Chỉnh sửa");
			$('#text-password').text("(Nhập mật khẩu mới để thay đổi)");
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					var lengthidKey = datas.idKey.length+1;
					$("#onSave").attr('data-url', datas.routes.update);
					$("#onSave").attr('data-id', data.data.id);
					$("#onSave").attr('data-action', 'update');
					$('#username').val(data.data.username.slice(lengthidKey));
					$('#note').val(data.data.note);
					$('#full_name').val(data.data.full_name);
					$("#modal-action").modal('show');
					
				},
				error: function (error) {}
			});
		});
		$("#btn-insert").on("click", function () {
			$('#modal-action-title').text("Thêm mới");
			$('#text-password').text("(Không nhập mặt định là : 12345)");
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#username').val('');
			$('#note').val('');
			$('#full_name').val('');
			$("#modal-action").modal('show');
		});
		$("#idTypeInvest").on("change", function (e) {
			table.ajax.reload();
		});
		$("#onDelete").on("click", function (e) {
			var id = $(this).val();
			e.preventDefault(e);
			var result = _AjaxDelete({
				id: id
			}, datas.routes.delete);
			if (result) {
				table.ajax.reload();
				surplus();
				$("#modal-delete").modal('hide');
			}
		});
		$('#formAction').validate({
			rules: {
				full_name:{
					required: true
				},
				username: {
					required: true
				}
			},
			messages: {
				full_name: {
					required: "Vui lòng nhập họ tên !",
				},
				username: {
					required: "Vui lòng nhập tên đăng nhập !",
				}
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			submitHandler: function (e) {
				var formData = new FormData($("#formAction")[0]);
				formData.append('id', $("#onSave").attr('data-id'));
				formData.set('username',datas.idKey+'@'+formData.get('username') );
				var url = $("#onSave").attr('data-url');
				buttonloading('#onSave', true);
				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					dataType: 'JSON',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data.statusBoolen) {
							buttonloading('#onSave', false);
							table.ajax.reload();
							$("#modal-action").modal('hide');
							surplus();
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
						} else {
							buttonloading('#onSave', false);
						}
					},
					error: function (error) {
						console.log(error);
						buttonloading('#onSave', false);
					}
				});
			}
		});
		$("#formAction").on('submit', function (e) {
			e.preventDefault();
		});
		$("#formPermission").on('submit', function (e) {
			e.preventDefault();
			var formData = new FormData($(this)[0]);
			buttonloading("#onSavePermission", true);
			$.ajax({
				url: datas.routes.permission,
				type: 'POST',
				data: formData,
				dataType: 'JSON',
				processData: false,
				contentType: false,
				success: function (data) {
					if (data.statusBoolen) {
						buttonloading('#onSavePermission', false);
						table.ajax.reload();
						$("#modal-permission").modal('hide');
						Toast.fire({
							icon: data.icon,
							title: data.messages
						});
					} else {
						buttonloading('#onSavePermission', false);
					}
				},
				error: function (error) {
					console.log(error);
					buttonloading('#onSavePermission', false);
				}
			});
		});
		
    }
}