function goals_dreams() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		$("#date").datepicker();
		$('#date').css("z-index", "0");
		$('#date').datepicker("option", "dateFormat", 'dd-mm-yy');
		var table = $("#goals_dreams-table").DataTable({
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
					title: "Mục Tiêu",
					data: "name",
					name: "name",
					className: "text-center",
					render: function (data, type, row, meta) {
						return  '<b >  </b> <b class="text-info">'+data +'</b><br><b class="text-danger">'+row.type+'</n>';
					}
				}
				,{
					title: "Thời Gian",
					data: "dateBegin",
					name: "dateBegin",
					className: "text-center",
					render: function (data, type, row, meta) {
						return  '<b > Bắt Đầu : </b> <b class="text-info">'+row.dateBegin +'</b><b class="text-danger"> Đến '+row.dateEnd+'</n>';
					}
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
						$("#onSave").attr('data-action', 'update');
						$('#typeInput').val(data.data.type); 
						$('#typeInput').trigger('change'); 
						$('#dateBegin').val(moment(data.data.dateBegin, " YYYY-MM-DD").format('DD-MM-YYYY'));
						$('#dateEnd').val(moment(data.data.dateEnd, " YYYY-MM-DD").format('DD-MM-YYYY'));
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
			$('#typeInput').val(''); 
			$('#typeInput').trigger('change'); 
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#dateBegin').datepicker('setDate', new Date());
			$('#dateEnd').datepicker('setDate', new Date());
			$('#name').val('');
			$('#note').val('');
			$("#modal-action").modal('show');
		});
		$("#idTypeGoals_dreams").on("change", function (e) {
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
				name: {
					required: true
				},
				typeInput: {
					required: true
				},
				dateBegin: {
					required: true
				},
				dateEnd: {
					required: true
				},
			},
			messages: {
				name: {
					required: "Vui lòng nhập mục tiêu !",
				},
				typeInput: {
					required: "Vui lòng chọn trạng thái !",
				},
				dateBegin: {
					required: "Vui lòng nhập ngày bắt đầu!",
				},
				dateEnd: {
					required: "Vui lòng nhập ngày kết thúc !",
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
				formData.set('dateBegin', moment(formData.get('dateBegin'), "DD-MM-YYYY").format('YYYY-MM-DD'));
				formData.set('dateEnd', moment(formData.get('dateEnd'), "DD-MM-YYYY").format('YYYY-MM-DD'));
				formData.set('type',formData.get('typeInput'));
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