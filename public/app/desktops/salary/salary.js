function salary() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		function echo(e){
			return	e==null?'':e;
		}
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
						idTypeSalary: $("#idTypeSalary").val(),
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
			 }, {
				title: "Nguồn Thu Nhập",
				data: "type_name",
				name: "type_name",
				render: function (data, type, row, meta) {
					return  '<b class="text-danger"><i class="fa fa-money"></i> : '+data + '</b><br>';
				}
			},
			{
				title: "Chi Tiết",
				data: "company",
				name: "company",
				className: "text-left",
				render: function (data, type, row, meta) {
					var html ='';
						if(data!=null){
							html += '<b class="text-danger"><i class="fa fa-building"></i> : '+echo(data) + '</b><br>';
						}
						html +='<b class="text-info"> <i class="fa fa-user"></i> : ' + echo(row.name) + '</b><br>';
						html +='<b class="text-success"> <i class="fa fa-calendar"></i> : ' + row.date + '</b>';
				
					 return html;
				
					}
			}
			, {
				title: "Tiền Lương",
				data: "amount",
				name: "amount",
				className: "text-center",
				render: function (data, type, row, meta) {
					return '<b class="">' + money_format(data) + ' VNĐ</b>';
				}
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
			}, ],drawCallback: function (settings) {
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
					$('#idTypeSalaryInput').val(data.data.idTypeSalary); // Select the option with a value of '1'
					$('#idTypeSalaryInput').trigger('change'); // Notify any JS components that the value changed
					$('#idWallet').val(data.data.idWallet); 
					$('#idWallet').trigger('change'); 
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
			$('#idWallet').val(''); 
			$('#idWallet').trigger('change'); 
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
				idWallet:{
					required:true,
				},
				idTypeSalaryInput:{
					required: true
				},
				company: {
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
				idTypeSalaryInput: {
					required: "Vui lòng chọn nhóm thu nhập !",
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
				formData.set('idTypeSalary', formData.get('idTypeSalaryInput'));
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