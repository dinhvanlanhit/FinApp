function users(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
        $("#birthday" ).datepicker();
        $('#birthday').css("z-index","0");
		$('#birthday').datepicker( "option", "dateFormat", 'yy-mm-dd' );
		$("#date" ).datepicker();
        $('#date').css("z-index","0");
        $('#date').datepicker( "option", "dateFormat", 'yy-mm-dd' );
        function UploadFile(fileInput){
            var is=false;
            var formData = new FormData();
            formData.append('file',$(fileInput)[0].files[0]);
            $.ajax({
                    url:datas.routes.uploadFile,
                    type:'POST',
                    data:formData,
                    dataType:'JSON',
                    processData: false,
                    contentType: false,
                    async:false,
                    success:function(data){
                        if(data.statusBoolen){
                            Toast.fire({
								icon: data.icon,
								title: data.messages
							});
                            is=data.statusBoolen;
                           
                        }else{
                            Toast.fire({
								icon: data.icon,
								title: data.messages
							});
                            is=data.statusBoolen;
                        }
                    },error:function(error){
                        is=false;
                        console.log(error);
                    }
            });
            return is;
        }
      
        $("#changeAvatar").on('change',function(){
            if(UploadFile("input[name=avatar]")){
                setImgSRC("#changeAvatar","#user_avatar_users,#user_avatar_sidebar");
            }
		});
		if(datas.action=='update'){
			$('#birthday').datepicker('setDate', datas.birthday);
			$('#date').datepicker('setDate', datas.date);
		}else{
			$('#birthday').datepicker('setDate', new Date());
			$('#date').datepicker('setDate',  new Date());
		}
        $('#formUsers').validate({
			rules: {
				full_name: {
					required: true
				},
				email: {
					required: true
				},
				birthday: {
					required: true
                },
                address_1: {
					required: true
                }
			},
			messages: {
				full_name: {
					required: "Vui lòng nhập họ tên ! ",
				},
				email: {
					required: "Email không được bỏ trống !",
                },
                birthday: {
					required: "Vui lòng nhập ngày sinh !",
				},
				address_1: {
					required: "Vui lòng nhập địa chỉ !",
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
				var formData = new FormData($("#formUsers")[0]);
				formData.append('id',datas.id);
				buttonloading('.onSave', true);
				$.ajax({
					url: datas.routes.save,
					type: 'POST',
					data: formData,
					dataType: 'JSON',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data.statusBoolen) {
							buttonloading('.onSave', false);
                            $("#modal-users").modal('hide');
                            $(".full_name_show").text(formData.get('full_name'));
							$(".email_show").text(formData.get('email'));
							window.location.href=datas.routes.users;
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
						} else {
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
							$(".error-email").html(data.messages);
							buttonloading('.onSave', false);
						}
					},
					error: function (error) {
						console.log(error);
						buttonloading('.onSave', false);
					}
				});
			}
		});
		$("#formUsers").on('submit', function (e) {
			e.preventDefault();
		});

    }
}