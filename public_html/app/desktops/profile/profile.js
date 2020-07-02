function profile(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
        $("#birthday" ).datepicker();
        $('#birthday').css("z-index","0");
        $('#birthday').datepicker( "option", "dateFormat", 'yy-mm-dd' );
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
                setImgSRC("#changeAvatar","#user_avatar_profile,#user_avatar_sidebar");
            }
        });
        $('#birthday').datepicker('setDate', datas.birthday);
        $('#formProfile').validate({
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
				var formData = new FormData($("#formProfile")[0]);
				buttonloading('#onSave', true);
				$.ajax({
					url: datas.routes.profile,
					type: 'POST',
					data: formData,
					dataType: 'JSON',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data.statusBoolen) {
							buttonloading('#onSave', false);
                            $("#modal-action").modal('hide');
                            $(".full_name_show").text(formData.get('full_name').toUpperCase());
                            $(".email_show").text(formData.get('email'));
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
							$('.error-email').html('');
						} else {
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
							$('.error-email').html('('+data.messages+')');
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
		$("#formProfile").on('submit', function (e) {
			e.preventDefault();
		});
		
		$("#formChangePassword").on('submit',function(e){
			e.preventDefault();
			var formData = new FormData($(this)[0]);
				buttonloading('#btn-change-password', true);
				$.ajax({
					url: datas.routes.changepassword,
					type: 'POST',
					data: formData,
					dataType: 'JSON',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data.statusBoolen) {
							buttonloading('#btn-change-password', false);
                            $("#old_password").val('');
							$("#new_password").val('');
							$("#re_password").val('');
							$(".alertJS").html(alertJS(data.messages,'success'));
							Toast.fire({
								icon: data.icon,
								title: data.messages
							});
						} else {
							$(".alertJS").html(alertJS(data.messages,'danger'));
							buttonloading('#btn-change-password', false);
						}
					},
					error: function (error) {
						console.log(error);
						$(".alertJS").html(alertJS(error,'danger'));
						buttonloading('#btn-change-password', false);
					}
				});
			
		});

    }
}