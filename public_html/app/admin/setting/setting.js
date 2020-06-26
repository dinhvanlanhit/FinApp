function settings(){
    this.datas= null;
    this.runJS=function(){
        var datas= this.datas;
        init_tinymce('#content_contact',500);
        init_tinymce('#content_banktransfer',500);
        function UploadFile(fileInput,type){
            var is=false;
            var formData = new FormData();
            formData.append('file',$(fileInput)[0].files[0]);
            formData.append('type',type);
            $.ajax({
                    url:datas.routes.upload,
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
        $("#changeLogo").on('change',function(){
            if(UploadFile("input[name=logo]",'logo')){
                setImgSRC("#changeLogo","#img_logo");
            }
        });
        $("#changeIcon").on('change',function(){
            if(UploadFile("input[name=icon]",'icon')){
                setImgSRC("#changeIcon","#img_icon");
            }
        });
        $("#formSetting").on('submit',function(e){
            e.preventDefault();
            buttonloading('.onSave', true);
            var formData = new FormData($(this)[0]);
            formData.append('content_contact', tinyMCE.editors["content_contact"].getContent());
            formData.append('content_banktransfer', tinyMCE.editors["content_banktransfer"].getContent());
            $.ajax({
                    url:datas.routes.update,
                    type:'POST',
                    data:formData,
                    dataType:'JSON',
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.statusBoolen){
                            Toast.fire({
								icon: data.icon,
								title: data.messages
                            });
                            buttonloading('.onSave', false);
                        }else{
                            buttonloading('.onSave', false);
                            Toast.fire({
								icon: data.icon,
								title: data.messages
							});
                        }
                    },error:function(error){
                        buttonloading('.onSave', false);
                        console.log(error);
                    }
            });
        });
    }
}