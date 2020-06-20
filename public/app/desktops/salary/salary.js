function salary() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		var table = $("#salary-table").DataTable({
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
			order: [5, "desc"],
			columns: [{
				title: "#",
				data: "id",
				name: "id",
				className: "text-center",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			}, {
				title: "Nguồn Thu Nhập",
				data: "company",
				name: "company",
				className: "text-center",
				render: function (data, type, row, meta) {
					return '<b class=""> Nơi Làm Việc : ' + data + '</b><br>'+'<b class="text-info"> Nguồn Thu Nhập :' + row.name + '</b>';
				}
			}, {
				title: "Tiền Lương",
				data: "amount",
				name: "amount",
				className: "text-center",
				render: function (data, type, row, meta) {
					return '<b class="">' + money_format(data) + ' VNĐ</b>';
				}
			}, {
				title: "Chi Tiết",
				data: "info",
				name: "info",
				className: "text-center",
			}, {
				title: "Ngày Nhận Lương",
				data: "date",
				name: "date",
				className: "text-center",
			}, {
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
					}]);
				}
			}, ]
		});
		$("#formSearch").on('submit', function (e) {
			e.preventDefault();
			table.ajax.reload();
		})
		$(document).delegate(".btn-delete", "click", function () {
			var id = $(this).val();
			$('#modal-text-delete').text("Bạn có muốn xóa không ?");
			$("#onDelete").attr('value', id);
			$("#modal-delete").modal('show');
		});
		$(document).delegate(".btn-update", "click", function () {
			var id = $(this).val();
			var elementbtn = $(this);
			buttonloading(elementbtn, true);
			$('#modal-action-title').text("Chỉnh sửa");
			$.ajax({
				url: datas.routes.update,
				data: {
					id: id
				},
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					console.log(data);
					$("#onSave").attr('data-url', datas.routes.update);
					$("#onSave").attr('data-id', data.data.id);
					$("#onSave").attr('data-action', 'update');
					$('#date').val(moment(data.data.date, " YYYY-MM-DD").format('DD-MM-YYYY'));
					$('#company').val(data.data.company);
					$('#amount').val(money_format(data.data.amount));
					$('#name').val(data.data.name);
					$("#modal-action").modal('show');
					buttonloading(elementbtn, false);
				},
				error: function (error) {}
			});
		});
		$("#btn-insert").on("click", function () {
			$('#modal-action-title').text("Thêm mới");
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#date').datepicker('setDate', new Date());
			$('#company').val('');
			$('#amount').val('');
			$('#name').val('');
			$("#modal-action").modal('show');
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
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$('#formAction').validate({
			rules: {
				company: {
					required: true
				},
				name: {
					required: true
				},
				amount: {
					required: true
				},
				date: {
					required: true
				}
			},
			messages: {
				name: {
					required: "Vui lòng nhập nguồn thu nhập ! ",
				},
				company: {
					required: "Vui lòng nhập nơi làm việc !",
				},
				amount: {
					required: "Bạn chưa nhập số tiền !",
				},
				date: {
					required: "Bạn chửa chọn ngày !",
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
				formData.append('info', "Lương tháng : " + moment(formData.get('date'), "DD-MM-YYYY").format('MM') + " Năm " + moment(formData.get('date'), "YYYY").format('YYYY'));
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