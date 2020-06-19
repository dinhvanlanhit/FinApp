function installment_purchase(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
        $("#date" ).datepicker();
        $('#date').css("z-index","0");
        $('#date').datepicker( "option", "dateFormat", 'dd-mm-yy' );

        $("#expiration_date" ).datepicker();
        $('#expiration_date').css("z-index","0");
        $('#expiration_date').datepicker( "option", "dateFormat", 'dd-mm-yy' );
        var table = $("#installment_purchase-table").DataTable({
            serverSide: true,
            processing:  true,
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
                        dateBegin: $("#dateBegin").val(),
                        dateEnd: $("#dateEnd").val(),
                        search: $("#search").val(),
                    });
                }
            },
            order: [5, "desc"],
            columns: [
                {
                    title:"#",
                    data: "id",
                    name: "id",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    title:"Thông Tin",
                    data: "name",
                    name: "name",
                    className: "text-left",
                    render: function (data, type, row, meta) {
                      var html =  '<b class="">Sản phẩm : '+row.name+'</b><br>';
                      html +=  '<b class="">Giá Tiền : '+money_format(row.amount)+' VNĐ</b><br>';
                      html +=  '<b class="">Trả góp : '+row.number_months+' Tháng</b><br>';
                      html +=  '<b class="">Trả hàng tháng : '+money_format(row.monthly_amount_to_pay)+' Tháng</b><br>';
                      html +=  '<b class="">Đã trả : '+null_to_number(row.remaining_month)+' Tháng</b><br>';
                      html +=  '<b class="">Còn lại : '+(row.number_months-row.remaining_month)+' Tháng</b><br>';
                      return html;
                    }
                   
                },
                {
                  title:"Trả trước",
                  data: "prepay",
                  name: "prepay",
                  className: "text-center",
                  render: function (data, type, row, meta) {
                    return '<b class="text-primary">'+money_format(data)+' VNĐ</b> ';
                }  
                 
                },
                {
                  title:"Đã Trả",
                  data: "paid",
                  name: "paid",
                  className: "text-center",
                  render: function (data, type, row, meta) {
                    return '<b class="text-success">'+money_format(data)+' VNĐ</b> ';
                  }  
                 
                },
                {
                  title:"Còn Nợ",
                  data: "debt",
                  name: "debt",
                  className: "text-center",
                  render: function (data, type, row, meta) {
                    return '<b class="text-danger">'+money_format(data)+' VNĐ</b> ';
                  }  
                 
                },
                {
                    title:"Tác vụ",
                    data: "created_at",
                    name: "created_at",
                    className: "text-center",
                    render: function (data, type, row, meta) {
                       var html = '<button class="btn btn-danger btn-delete btn-xs" value="'+row.id+'">Xóa</button>&nbsp;&nbsp;';
                          html += '<button class="btn btn-success btn-update btn-xs" value="'+row.id+'">Sửa</button>&nbsp;&nbsp;';
                          html += '<button class="btn btn-info btn-update btn-xs" value="'+row.id+'">Trả Tháng</button>';
                       return '<div class="form-group">'+html+'</div>';
                    }
                   
                },
            ]

        });
        $("#formSearch").on('submit',function(e){
            e.preventDefault();
            table.ajax.reload();
        })
        $(document).delegate(".btn-delete", "click", function () {
          var id = $(this).val();
            $('#modal-text-delete').text("Bạn có muốn xóa không ?");
            $("#onDelete").attr('value',id);
            $("#modal-delete").modal('show');
        });
        $(document).delegate(".btn-update", "click", function () {
          $("#formAction").data('validator').resetForm();
            var id = $(this).val();
            var elementbtn = $(this);
            buttonloading(elementbtn,true);
            $('#modal-action-title').text("Chỉnh sửa");
            $.ajax({
              url:datas.routes.update,
              data:{id:id},
              type:'GET',
              dataType:'JSON',
              success:function(data){
                  $("#onSave").attr('data-url',datas.routes.update);
                  $("#onSave").attr('data-id',data.data.id);
                  $("#onSave").attr('data-action','update');
                  $('#name').val(data.data.name);
                  $('#amount').val(money_format(data.data.amount));
                  $('#number_months').val(data.data.number_months);
                  $('#remaining_month').val(data.data.remaining_month);
                  $('#monthly_amount_to_pay').val(money_format(data.data.monthly_amount_to_pay));
                  $('#prepay').val(money_format(data.data.prepay));
                  $('#paid').val(money_format(data.data.paid));
                  $('#debt').val(money_format(data.data.debt));
                  $('#date').val(moment(data.data.date," YYYY-MM-DD").format('DD-MM-YYYY') );
                  $('#expiration_date').val(moment(data.data.expiration_date," YYYY-MM-DD").format('DD-MM-YYYY') );
                  $('#address').val(data.data.address);
                  $("#modal-action").modal('show');
                  buttonloading(elementbtn,false);
               

              },error:function(error){

              }
            });
        });
        function sum(){
          var  amount = parseInt(money_format_to_number($('#amount').val()));
          var  prepay = parseInt(money_format_to_number($('#prepay').val()));
          var  number_months = parseInt($('#number_months').val());
          var rs = (amount-prepay)/number_months;
          $('#monthly_amount_to_pay').val(money_format(rs));
        }
        $("#number_months,#amount,#prepay").on('keyup',function(){
          sum(); 
        });
        $("#onDelete").on("click",function(e){
            var id = $(this).val();
            e.preventDefault(e);
            buttonloading('#onDelete',true);
            var result = _AjaxDelete({id:id},datas.routes.delete);
            if(result){
                table.ajax.reload();
                $("#modal-delete").modal('hide');
                buttonloading('#onDelete',false);
            }
        });
  
      var f=  $('#formAction').validate({
                rules: {
                  name: {
                    required: true
                  },
                  amount: {
                    required: true
                  },
                  number_months: {
                    required: true
                  },
                  monthly_amount_to_pay: {
                    required: true
                  },
                  prepay: {
                    required: true
                  },
                  
                  date: {
                    required: true
                  }
                  ,expiration_date: {
                    required: true
                  } 
                },
                messages: {
                  name: {
                    required:"Chưa nhập sản phẩm ",
                  },
                  amount: {
                    required: "Chưa nhập giá tiền ! ",
                  },
                  number_months: {
                    required: "Chưa nhập số tháng  !",
                  },
                  prepay: {
                    required: "Chưa nhập số tiền trả trước !",
                  },
                  monthly_amount_to_pay: {
                    required: "Chưa nhập số tiền trả hàng tháng  !",
                  },
                  date: {
                    required: "Chưa nhập ngày mua",
                  }
                  ,expiration_date: {
                    required: "Chưa nhập ngày hết hạn",
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
                    buttonloading('#onSave',true);
                    var url = $("#onSave").attr('data-url');
                    var formData = new FormData($("#formAction")[0]);
                    formData.append('id',$("#onSave").attr('data-id'));
                    formData.set('amount',money_format_to_number(formData.get('amount')));
                    formData.set('monthly_amount_to_pay',money_format_to_number(formData.get('monthly_amount_to_pay')));
                    formData.set('prepay',money_format_to_number(formData.get('prepay')));
                    formData.set('date',moment(formData.get('date'),"DD-MM-YYYY").format('YYYY-MM-DD'));
                    formData.set('expiration_date',moment(formData.get('expiration_date'),"DD-MM-YYYY").format('YYYY-MM-DD'));
                    $.ajax({
                        url:url,
                        type:'POST',
                        data:formData,
                        dataType:'JSON',
                        processData: false,
                        contentType: false,
                        success:function(data){
                            if(data.statusBoolen){
                                buttonloading('#onSave',false);
                                table.ajax.reload();
                                $("#modal-action").modal('hide');
                                Toast.fire({
                                  icon: data.icon,
                                  title:data.messages
                                 });
                            }else{
                                buttonloading('#onSave',false);
                                
                            }
                        },error:function(error){
                            console.log(error);
                            buttonloading('#onSave',false);
                        }
                    });
                }
        });
        $("#formAction").on('submit',function(e){
            e.preventDefault();
        });
        $("#amount").on("input", function () {
          input_money_format(this);
        });
        $("#monthly_amount_to_pay").on("input", function () {
          input_money_format(this);
        });
        $("#prepay").on("input", function () {
          input_money_format(this);
        });
        $("#btn-insert").on("click",function (){
          $('#modal-action-title').text("Thêm mới");
          $("#onSave").attr('data-url',datas.routes.insert);
          $("#onSave").attr('data-action','insert');
          $('#date').datepicker('setDate', new Date());
          $('#name').val('');
          $('#amount').val();
          $('#number_months').val('');
          $('#remaining_month').val('');
          $('#monthly_amount_to_pay').val('');
          $('#prepay').val('');
          $('#paid').val('');
          $('#debt').val('');
          $('#date').datepicker('setDate', new Date());
          $('#expiration_date').datepicker('setDate', new Date());
          // $("#formAction").clearValidation();
     
          $("#modal-action").modal('show');
      });
       
    }
}