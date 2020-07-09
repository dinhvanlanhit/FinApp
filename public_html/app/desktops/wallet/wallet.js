function wallet() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		var table = $("#wallet-table").DataTable({
			paging: true,
			lengthChange: true,
			searching: true,
			ordering: true,
			info: true,
			responsive: true,
			autoWidth: false,
			ajax: {
				url: datas.routes.datatable,
				type: "GET",
				data: function (d) {
					return $.extend({}, d, {
						type: $("#type").val(),
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
					title: "Ví Tiền",
					data: "name",
					name: "name",
					className: "text-left",
					render: function (data, type, row, meta) {
						return '<b class="text-info">'+data +' </b>';
					}
				},
				{
					title: "Số tiền",
					data: "amount",
					name: "amount",
					className: "text-center",
					render: function (data, type, row, meta) {
						var amount = (row.amount+row.sumINCOME) - row.sumCOST;
						return '<b class="">' + money_format(amount) + ' VNĐ</b>';
					}
				},
				{
					title: "Ghi Chú",
					data: "note",
					name: "note",
					className: "text-center",
				},
				{
					title: "Cập Nhật",
					data: "updated_at",
					name: "updated_at",
					className: "text-center",
				},
				{
					title: "Tác vụ",
					data: "updated_at",
					name: "updated_at",
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
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$(document).delegate(".btn-delete", "click", function () {
			var id = $(this).val();
			var html = '<b class="text-danger">Lưu ý tất cả dịch vụ mà sủ dụng ví tiến nầy sẽ bị xóa vĩnh viễn ? Bạn có chắc chắn muốn xóa không ? </b>'
			$('#modal-text-delete').html(html);
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
		});
		$(document).delegate(".btn-update", "click", function () {
			var id = $(this).val();
			var elementbtn = $(this);
			
			$('#modal-action-title').text("Chỉnh sửa");
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					if(data.statusBoolen){
						$("#onSave").attr('data-url', datas.routes.update);
						$("#onSave").attr('data-id', data.data.id);
						$('#idTypeWallet').val(data.data.idTypeWallet); // Select the option with a value of '1'
						$('#idTypeWallet').trigger('change'); // Notify any JS components that the value changed
						$("#onSave").attr('data-action', 'update');
						$('#name').val(data.data.name);
						$('#note').val(data.data.note);
						$('#amount').val(money_format(data.data.amount));
						$("#modal-action").modal('show');
					}else{
						Toast.fire({
							icon: data.icon,
							title: data.messages
						});
					}
				},
				error: function (error) {}
			});
		});
		$("#btn-insert").on("click", function () {
			$('#idTypeWallet').val(''); // Select the option with a value of '1'
			$('#idTypeWallet').trigger('change'); // Notify any JS components that the value changed
			$('#modal-action-title').text("Thêm mới");
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#name').val('');
			$('#amount').val('');
			$('#note').val('');
			$("#modal-action").modal('show');
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
			else{
				$("#modal-delete").modal('hide');
				
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
				idTypeWallet: {
					required: true
				},
				name: {
					required: true
				},
				amount: {
					required: true
				},
			},
			messages: {
				idTypeWallet: {
					required: "Vui lòng chọn loại ví !",
				},
				name: {
					required: "Vui lòng nhập tên ví !",
				},
				amount: {
					required: "Vui lòng chọn trạng thái !",
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
							surplus();
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
						} else {
							buttonloading('#onSave', false);
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
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