function lendloan() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		$("#expiration_date").datepicker();
		$('#expiration_date').css("z-index", "0");
		$('#expiration_date').datepicker("option", "dateFormat", 'dd-mm-yy');
		


		var table = $("#lendloan-table").DataTable({
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
						idTypeLendloan: $("#idTypeLendloan").val(),
						dateBegin: $("#dateBegin").val(),
						dateEnd: $("#dateEnd").val(),
						search: $("#search").val(),
					});
				}
			},
			order: [0, "desc"],
			columns: [{
				title: "#",
				data: "created_at",
				name: "created_at",
				className: "text-center",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			}, 
			
			{
				title: "Người Vay",
				data: "name",
				name: "name",
				className: "text-center",
				render: function (data, type, row, meta) {
					var html ='';
						html += '<b class="text-success"> '+row.type_name + '</b>';
					 return html;
				
				}
			},
			{
				title: "Chi Tiết",
				data: "loan",
				name: "loan",
				className: "text-left",
				render: function (data, type, row, meta) {
					var html ='';
						html += '<b class="text-danger"><i class="fa fa-building"></i> : '+row.name + '</b><br>';
						html +='<b class="text-success">  <i class="fa fa-calendar"></i> Kỳ Hạn : ' + row.tenor + '</b><br>';
						html +='<b class="text-warning">  <i class="fa fa-money"></i> Lãi Xuất : ' + money_format(row.interest_rate) + '</b>';
				
					 return html;
				
				}
			},{
				title: "Số tiền",
				data: "loan",
				name: "loan",
				className: "text-center",
				render: function (data, type, row, meta) {
					html = '<b class="">' + money_format(data) + ' VNĐ</b><br>';
					html +='<b class="text-danger">  ' + row.date + ' => '+row.expiration_date+'</b>';
					return html;
				}
			}, {
				title: "Ghi Chú",
				data: "note",
				name: "note",
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
			}, ],
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
					$('#idTypeLendloanInput').val(data.data.idTypeLendloan); 
					$('#idTypeLendloanInput').trigger('change'); 
					$("#onSave").attr('data-url', datas.routes.update);
					$("#onSave").attr('data-id', data.data.id);
					$("#onSave").attr('data-action', 'update');
					$('#date').val(moment(data.data.date, " YYYY-MM-DD").format('DD-MM-YYYY'));
					$('#expiration_date').val(moment(data.data.expiration_date, " YYYY-MM-DD").format('DD-MM-YYYY'));
					$('#name').val(data.data.name);
					$('#loan').val(money_format(data.data.loan));
					$('#interest_rate').val(money_format(data.data.interest_rate));
					$('#note').val(data.data.note);
					$('#tenor').val(data.data.tenor);
					$("#modal-action").modal('show');
					buttonloading(elementbtn, false);
				},
				error: function (error) {}
			});
		});
		$("#btn-insert").on("click", function () {
			$('#modal-action-title').text("Thêm mới");
			$('#idTypeLendloanInput').val("");
			$('#idTypeLendloanInput').trigger('change');
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#date').datepicker('setDate', new Date());
			$('#expiration_date').datepicker('setDate', new Date());
			$('#loan').val('');
			$('#name').val('');
			$('#interest_rate').val('');
			$('#note').val('');
			$('#tenor').val('');
			$("#modal-action").modal('show');
		});
		
		$("#idTypeLendloan").on("change", function (e) {
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
				idTypeLendloanInput: {
					required: true
				},
				name: {
					required: true
				},
				loan: {
					required: true
				},
				tenor: {
					required: true
				},
				interest_rate: {
					required: true
				},
				date: {
					required: true
				},
				expiration_date: {
					required: true
				}
			},
			messages: {
				idTypeLendloanInput:{
					required: "Vui lòng chọn nhóm nợ ! ",
				},
				name: {
					required: "Vui lòng nhập đơn vị vay !",
				},
				loan: {
					required: "Vui lòng nhập khoản vay !",
				},
				loan: {
					required: "Vui lòng nhập kỳ hạn !",
				},
				interest_rate: {
					required: "Vui lòng nhập lãi suất !",
				},
				date: {
					required: "Vui lòng nhập ngày vay !",
				},
				expiration_date: {
					required: "Vui lòng nhập ngày hết hạn !",
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
				formData.set('date', moment(formData.get('date'), "DD-MM-YYYY").format('YYYY-MM-DD'));
				formData.set('expiration_date', moment(formData.get('expiration_date'), "DD-MM-YYYY").format('YYYY-MM-DD'));
				formData.set('loan', money_format_to_number(formData.get('loan')));
				formData.set('interest_rate', money_format_to_number(formData.get('interest_rate')));
				formData.set('idTypeLendloan',formData.get('idTypeLendloanInput'));
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