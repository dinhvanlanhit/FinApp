function debt() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		$("#expiration_date").datepicker();
		$('#expiration_date').css("z-index", "0");
		$('#expiration_date').datepicker("option", "dateFormat", 'dd-mm-yy');
		


		var table = $("#debt-table").DataTable({
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
						idTypeDebt: $("#idTypeDebt").val(),
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
				title: "Nhóm Nợ",
				data: "type_name",
				name: "type_name",
				className: "text-center",
				render: function (data, type, row, meta) {
					var html ='';
						html += '<b class="text-success"> '+row.type_name + '</b>';
					 return html;
				
				}
			},
			{
				title: "Chi Tiết",
				data: "amount",
				name: "amount",
				className: "text-left",
				render: function (data, type, row, meta) {
					var html ='';
						html += '<b class=""><i class="fa fa-building"></i> : '+row.name + '</b><br>';
						html +='<b class="">  <i class="fa fa-calendar"></i> Kỳ Hạn : ' + row.tenor + '</b><br>';
						html +='<b class="">  <i class="fa fa-money"></i> Lãi Xuất : ' + money_format(row.interest_rate) + '</b><br>';
						html +='<b class="">  <i class="fa fa-money"></i> Trạng Thái : ' + row.status + '</b>';
						
					 return html;
				
				}
			},{
				title: "Số tiền",
				data: "amount",
				name: "amount",
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
						$('#idTypeDebtInput').val(data.data.idTypeDebt); 
						$('#idTypeDebtInput').trigger('change'); 
						$('#status').val(data.data.status); 
						$('#status').trigger('change'); 
						$('#idWallet').val(data.data.idWallet); 
						$('#idWallet').trigger('change'); 
						$("#onSave").attr('data-url', datas.routes.update);
						$("#onSave").attr('data-id', data.data.id);
						$("#onSave").attr('data-action', 'update');
						$('#date').val(moment(data.data.date, " YYYY-MM-DD").format('DD-MM-YYYY'));
						$('#expiration_date').val(moment(data.data.expiration_date, " YYYY-MM-DD").format('DD-MM-YYYY'));
						$('#name').val(data.data.name);
						$('#amount').val(money_format(data.data.amount));
						$('#interest_rate').val(money_format(data.data.interest_rate));
						$('#note').val(data.data.note);
						$('#tenor').val(data.data.tenor);
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
			$('#idTypeDebtInput').val("");
			$('#idTypeDebtInput').trigger('change');
			$('#idWallet').val(""); // Select the option with a value of '1'
			$('#idWallet').trigger('change'); // Notify any JS components that the value changed

			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#date').datepicker('setDate', new Date());
			$('#expiration_date').datepicker('setDate', new Date());
			$('#amount').val('');
			$('#name').val('');
			$('#interest_rate').val('');
			$('#note').val('');
			$('#tenor').val('');
			$("#modal-action").modal('show');
		});
		
		$("#idTypeDebt").on("change", function (e) {
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
			else{
				$("#modal-delete").modal('hide');
				
			}
		});
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$("#interest_rate").on("input", function () {
			input_money_format(this);
		});
		$('#formAction').validate({
			rules: {
				idTypeDebtInput: {
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
				idTypeDebtInput:{
					required: "Vui lòng chọn nhóm nợ ! ",
				},
				name: {
					required: "Vui lòng nhập đơn vị vay !",
				},
				amount: {
					required: "Vui lòng nhập khoản vay !",
				},
				
				date: {
					required: "Vui lòng nhập ngày vay !",
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
				formData.set('amount', money_format_to_number(formData.get('amount')));
				formData.set('interest_rate', money_format_to_number(formData.get('interest_rate')));
				formData.set('idTypeDebt',formData.get('idTypeDebtInput'));
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