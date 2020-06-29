function contact (){
    this.datas= null;
    this.runJS =function(){
        var datas = this.datas;
        $("#formContact").on('submit',function(e){
            var formData = new FormData($(this)[0])
            buttonloading('#onSend', true);
            e.preventDefault();
            $.ajax({
                url:datas.routes.send,
                type:'POST',
                data: formData,
				dataType: 'JSON',
				processData: false,
				contentType: false,
                success:function(data){
                    if (data.statusBoolen) {
						buttonloading('#onSend', false);
						Toast.fire({
							icon: data.icon,
							title: data.messages
                        });
                        $("#msg").val('');
                        $("#phone_number").val('');
                        $("#full_name").val('');
                        $("#email").val('');
                        $("#recaptcha-msg").text('');
					} else {
                        Toast.fire({
							icon: data.icon,
							title: data.messages
                        });
                        $("#recaptcha-msg").text(data.messages);
						buttonloading('#onSend', false);
					}

                },error:function(error){
                    console.log(error)
                    buttonloading('#onSend', false);
                }
            })
        });
    }
}