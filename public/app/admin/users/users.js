function users() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		var table = $("#users-table").DataTable({
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
						// dateBegin: $("#dateBegin").val(),
						// dateEnd: $("#dateEnd").val(),
						status : $("#status").val(),
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
					title: "Địa chỉ",
					data: "address_1",
					name: "address_1",
					className: "text-center",
				}, 
				{
					title: "Trạng Thái",
					data: "status_name",
					name: "status_name",
					className: "text-center",
					
				},
			    {
					title: "Ngày Đăng Ký",
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
						}, 
						{
							class: 'btn-update',
							value: row.id,
							title: 'Sửa',
							icon: '',
							text: 'Sửa'
						},
						{
							class: 'btn-update',
							value: row.id,
							title: 'Thanh Toán',
							icon: '',
							text: 'Thanh Toán'
						}
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
		})
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$(document).delegate(".btn-delete", "click", function () {
			var id = $(this).val();
			$('#modal-text-delete').text("Bạn có muốn xóa không ?");
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
		});
		$(document).delegate(".btn-update", "click", function () {
			var id = $(this).val();
			return window.location.href=datas.routes.update+'/'+id;
		
		});
		


		$("#btn-insert").on("click", function () {
			$('#modal-action-title').text("Thêm mới");
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#date').datepicker('setDate', new Date());
			$('#name').val('');
			$('#amount').val('');
			$('#note').val('');
			$('#address').val('');
			$("#modal-action").modal('show');
		});
		$("#idTypeusers").on("change", function (e) {
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
		$("#loan").on("input", function () {
			input_money_format(this);
		});
		$("#interest_rate").on("input", function () {
			input_money_format(this);
		});
		$('#formAction').validate({
			rules: {
				name: {
					required: true
				},
				amount: {
					required: true
				},
				date: {
					required: true
				},
			},
			messages: {
				name: {
					required: "Vui lòng nhập lĩnh vực đâu tư !",
				},
				amount: {
					required: "Vui lòng nhập lĩnh vực đâu tư !",
				},
				date: {
					required: "Vui lòng nhập ngày đâu tư !",
				},
				
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
				formData.set('date', moment(formData.get('date'), "DD-MM-YYYY").format('YYYY-MM-DD'));
				formData.set('amount', money_format_to_number(formData.get('amount')));
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
	}
}