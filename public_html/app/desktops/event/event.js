function event() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		var table = $("#event-table").DataTable({
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
						idTypeEvent: $("#idTypeEvent").val(),
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
			}, 
			
			{
				title: "Sự Kiện",
				data: "type_name",
				name: "type_name",
				className: "text-center",
			},
			{
				title: "Tên",
				data: "name",
				name: "name",
				className: "text-center",
			}, {
				title: "Địa chỉ",
				data: "address",
				name: "address",
				className: "text-center",
			}, {
				title: "Số tiền",
				data: "amount",
				name: "amount",
				className: "text-center",
				render: function (data, type, row, meta) {
					return '<b class="">' + money_format(data) + ' VNĐ</b>';
				}
			}, {
				title: "Ngày",
				data: "date",
				name: "date",
				className: "text-center",
			}, 
			 {
				title: "Ghi Chú",
				data: "note",
				name: "note",
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
			},]
			,drawCallback: function (settings) {
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
						$('#idTypeEventInput').val(data.data.idTypeEvent);
						$('#idTypeEventInput').trigger('change');
						$('#idWallet').val(data.data.idWallet); 
						$('#idWallet').trigger('change'); 
						$("#onSave").attr('data-url', datas.routes.update);
						$("#onSave").attr('data-id', data.data.id);
						$("#onSave").attr('data-action', 'update');
						$('#date').val(moment(data.data.date, " YYYY-MM-DD").format('DD-MM-YYYY'));
						$('#address').val(data.data.address);
						$('#amount').val(money_format(data.data.amount));
						$('#name').val(data.data.name);
						$('#note').val(data.data.note);
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
			$('#modal-action-title').text("Thêm mới");
			$('#idTypeEventInput').val(""); // Select the option with a value of '1'
			$('#idTypeEventInput').trigger('change'); // Notify any JS components that the value changed
			$('#idWallet').val(""); // Select the option with a value of '1'
			$('#idWallet').trigger('change'); // Notify any JS components that the value changed
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#date').datepicker('setDate', new Date());
			$('#address').val('');
			$('#amount').val('');
			$('#name').val('');
			$('#note').val('');
			$("#modal-action").modal('show');
		});
		
		$("#idTypeEvent").on("change", function (e) {
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
				$("#modal-delete").modal('hide');
				
				surplus();
			}else{
				$("#modal-delete").modal('hide');
				
			}
		});
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$('#formAction').validate({
			rules: {
				idWallet:{
					required: true
				},
				idTypeEventInput: {
					required: true
				},
				name: {
					required: true
				},
				address: {
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
				idWallet:{
					required: "Vui lòng chọn ví tiền để giao dịch ! ",
				},
				idTypeEventInput:{
					required: "Vui lòng chọn nhóm sự kiện ! ",
				},
				name: {
					required: "Vui lòng nhập tên ! ",
				},
				address: {
					required: "Vui lòng nhập địa chỉ ! ",
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
				formData.set('idTypeEvent',formData.get('idTypeEventInput'));
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