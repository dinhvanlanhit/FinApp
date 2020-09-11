function payment(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
        $("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		var table = $("#payment-table").DataTable({
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
						idUser: datas.idUser,
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
					title: "Gói Sử Dụng",
					data: "name",
					name: "name",
					className: "text-center",
                },
                {
					title: "Số Tiền",
					data: "amount",
					name: "amount",
					className: "text-center",
					render: function (data, type, row, meta) {
						return '<b class="">' + money_format(data) + ' VNĐ</b>';
					}
				},
				{
					title: "Ghi Chú",
					data: "note",
					name: "note",
					className: "text-center",
                }
                ,{
					title: "Ngày",
					data: "date",
					name: "date",
					className: "text-center",
                },
                {
					title: "Ngày Cập Nhật",
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
					$('#idUsePayment').val(data.data.idUsePayment); 
					$('#idUsePayment').trigger('change.select2'); 
					$("#onSave").attr('data-url', datas.routes.update);
					$("#onSave").attr('data-id', data.data.id);
					$("#onSave").attr('data-action', 'update');
					$('#numberMonth').val(data.data.numberMonth);
					$('#amount').val(money_format(data.data.amount));
					$('#note').val(data.data.note);
					$('#date').val(moment(data.data.date, " YYYY-MM-DD").format('DD-MM-YYYY'));
					$("#modal-action").modal('show');
					buttonloading(elementbtn, false);
				},
				error: function (error) {}
			});
		});
		$("#idUsePayment").on('change',function(){
			$('#numberMonth').val($("#idUsePayment :selected").attr('data-numbermonth'));
			$('#amount').val($("#idUsePayment :selected").attr('data-amount'));
			$('#note').val($("#idUsePayment :selected").attr('data-note'));
		})
	

		$("#btn-insert").on("click", function () {
			$('#modal-action-title').text("Thêm mới");
			$('#idUsePayment').val(''); 
			$('#idUsePayment').trigger('change'); 
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#amount').val('');
			$('#numberMonth').val('');
			$('#date').datepicker('setDate', new Date());
			$('#note').val('');
			$("#modal-action").modal('show');
		});
		$("#onDelete").on("click", function (e) {
			var id = $(this).val();
			e.preventDefault(e);
			buttonloading('#onDelete', true);
			var result = _AjaxDelete({
				id: id,
				idUser:datas.idUser
			}, datas.routes.delete);
			if (result) {
				table.ajax.reload();
				surplus();
				$("#modal-delete").modal('hide');
				buttonloading('#onDelete', false);
			}
		});
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$('#formAction').validate({
			rules: {
				idUsePayment:{
					required: true
				},
				numberMonth:{
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
				numberMonth:{
					required: "Vui lòng nhập số tháng sử dụng !",
				},
				idUsePayment: {
					required: "Vui lòng chọn gói sử dụng !",
				},
				amount: {
					required: "Vui lòng nhập số tiền thanh toán !",
				},
				date: {
					required: "Vui lòng nhập ngày thanh toán !",
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
				formData.append('idUser', datas.idUser);
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

    }
}