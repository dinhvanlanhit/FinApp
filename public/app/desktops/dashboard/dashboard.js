function dashboard() {
	this.datas = null;
	this.runJS = function () {
		var me =  this;
		me.Export();
		var datas = this.datas;
		$('#calendar').datetimepicker({
			format: 'L',
			lang: 'vi',
			inline: true
		});
        daterange('#dashboard_daterange','#dashboard_dateBegin','#dashboard_dateEnd');
		$("#dashboard_daterange").on('change', function (e) {
			runDashboard();
		});
		runDashboard();
		function runDashboard(){
			$.ajax({
				url: datas.routes.dashboard,
				type: 'GET',
				data: {
					dateBegin: $("#dashboard_dateBegin").val(),
					dateEnd: $("#dashboard_dateEnd").val(),
				},
				async:false,
				dataType: 'JSON',
				success: function (data) {
					$('#sumEvent').text(money_format(data.data.sumEvent)+' VNĐ');
					$('#sumShopping').text(money_format(data.data.sumShopping)+' VNĐ');
					$('#sumCost').text(money_format(data.data.sumCost)+' VNĐ');
					$('#sumSalary').text(money_format(data.data.sumSalary)+' VNĐ');
					$('#sumInvest').text(money_format(data.data.sumInvest)+' VNĐ');
					$('#sumLendloan').text(money_format(data.data.sumLendloan)+' VNĐ');
					$('#sumDebt').text(money_format(data.data.sumDebt)+' VNĐ');
					$('#sumAsset').text(money_format(data.data.sumAsset)+' VNĐ');
					me.runChar(data.data,'dashboard-chart-top')
				},
				error: function (error) {
					console.log(error)
				}
			});
		}
        me.chartDashboard();
	},
	this.chartDashboard = function () {
		var me =  this;
		var datas = this.datas;
		daterange('#Chart_daterange','#Chart_dateBegin','#Chart_dateEnd');
		function loadChar(){
			me._Ajax(
				datas.routes.getCharDashboard,
				$('#Chart_dateBegin').val(),
				$('#Chart_dateEnd').val(),
				$('#TypeDashboard').val(),
				'dashboard-chart'
			);
		}
		loadChar();
		$("#Chart_daterange,#TypeDashboard").on('change', function (e) {
			loadChar();
        });
	
	},
	this.format =function(a){
		// console.log(a);
		return a.seriesName+'<br>'+a.name+' : '+money_format(a.value)+' ('+a.percent+'%)';
	}
	this.runChar=function(data,id){
		var me = this;
		$(window).resize(function () {
			EventDoughnut.resize();
		});
		var EventDoughnut = echarts.init(document.getElementById(id));
		var sumTotal = '';
		if(data.sumTotal!=null){
			sumTotal = "Tổng : "+money_format(data.sumTotal);
		}
		var option = {
			textStyle: {
				fontFamily: "Tahoma,Arial"
			},
			title: {
				text: 'Biểu đồ tỷ lệ',
				subtext: sumTotal,
			},
			tooltip: {
				trigger: 'item',
				formatter:me.format
			},
			legend: {
				bottom: 10,
				left: 'center',
				data: data.lable
			},
			calculable: true,
			color: data.color,
			series: [
				{
					name: "Thống Kê",
					type: 'pie',
					radius: ['50%', '70%'],
					avoidLabelOverlap: false,
					label: {
						show: false,
						position: 'center'
					},
					emphasis: {
						label: {
							show: true,
							fontSize: '20',
							fontWeight: 'bold'
						}
					},
					labelLine: {
						show: false
					},
					data:data.data
				},
				
			]
		
		};
		EventDoughnut.setOption(option);
	}
	this._Ajax=function(url,begin,end,type,id){
		var me = this;
		var idChart = id;
		$.ajax({
			url: url,
			type: 'GET',
			data: {
				dateBegin: begin,
				dateEnd: end,
				type:type,
			},
			dataType: 'JSON',
			async:false,
			success: function (data) {
				// console.log(data)
				me.runChar(data.data,idChart);
				
			},
			error: function (error) {
				console.log(error)
			}
		});
		
	}
	this.Export =function(){
		var datas = this.datas;
		$("#formExport").on('submit',function(e){
			e.preventDefault();
			buttonloading('#export-excel', true);
			var formData = new FormData($(this)[0]);
			$.ajax({
				url: datas.routes.export,
				type: 'POST',
				data: formData,
				dataType: 'JSON',
				processData: false,
				contentType: false,
				success: function (data) {
					if (data.statusBoolen) {
						buttonloading('#export-excel', false);
						$("#modal-action").modal('hide');
						Toast.fire({
							icon: data.icon,
							title: data.messages
						});
						var a = $("<a>");
						a.attr("href", data.file),
						$("body").append(a),
						a.attr("download", data.name + ".xls"),
						a[0].click(),
						a.remove();
					} else {
						buttonloading('#export-excel', false);
					}
				},
				error: function (error) {
					console.log(error);
					buttonloading('#export-excel', false);
				}
			});
		});
	}

}