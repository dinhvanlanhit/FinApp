function asset() {
	this.datas = null;
	this.runJS = function () {
		var datas = this.datas;
		function echo(e){
			if(e==''||e==null){
				return '';
			}
			return e;
		}
		var table = $("#asset-table").DataTable({
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
						idTypeAsset: $("#idTypeAsset").val(),
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
					title: "Tên Tài Sản",
					data: "type_name",
					name: "type_name",
					
				}
				,{
				title: "Trị Giá",
				data: "amount",
				name: "amount",
				className: "text-center",
				render: function (data, type, row, meta) {
					var html ='';
						html +='<b class="">Trị giá : ' + money_format(data) + ' VNĐ</b><br>';
						html +='<b class="">Địa chỉ : ' + echo(row.address) + '</b>';
					 return html;
				}
				},
				{
					title: "Ghi chú",
					data: "note",
					name: "note",
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
						$('#idTypeAssetInput').val(data.data.idTypeAsset); // Select the option with a value of '1'
						$('#idTypeAssetInput').trigger('change'); // Notify any JS components that the value changed
						$("#onSave").attr('data-url', datas.routes.update);
						$("#onSave").attr('data-id', data.data.id);
						$("#onSave").attr('data-action', 'update');
						$('#name').val(data.data.name);
						$('#amount').val(money_format(data.data.amount));
						$('#note').val(data.data.note);
						$('#address').val(data.data.address);
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
			$("#onSave").attr('data-url', datas.routes.insert);
			$("#onSave").attr('data-action', 'insert');
			$('#idTypeAssetInput').val(''); 
			$('#idTypeAssetInput').trigger('change');
			$('#name').val('');
			$('#amount').val('');
			$('#note').val('');
			$('#address').val('');
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
				$("#modal-delete").modal('hide');
				
			}
			else{
				$("#modal-delete").modal('hide');
				
			}
		});
		$("#amount").on("input", function () {
			input_money_format(this);
		});
		$('#formAction').validate({
			rules: {
				idTypeAssetInput:{
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
				idTypeAssetInput: {
					required: "Vui lòng chọn nhóm tài sản !",
				},
				amount: {
					required: "Bạn chưa nhập tên tài sản !",
				},
				amount: {
					required: "Bạn chưa nhập số tiền !",
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
				formData.set('amount', money_format_to_number(formData.get('amount')));
				formData.set('idTypeAsset', formData.get('idTypeAssetInput'));
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