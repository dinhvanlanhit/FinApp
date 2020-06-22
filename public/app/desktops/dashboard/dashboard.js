function dashboard() {
	this.datas = null;
	this.runJS = function () {
        var me =  this;
        var datas = this.datas;
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
					$('#sumEvent').text(money_format(data.data.sumEvent));
					$('#sumShopping').text(money_format(data.data.sumShopping));
					$('#sumCost').text(money_format(data.data.sumCost));
					$('#sumSalary').text(money_format(data.data.sumSalary));
					console.log(data)
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
	this.runChar=function(data,id){
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
				formatter: '{a} <br/>{b}: {c} ({d}%)'
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
				console.log(data)
				me.runChar(data.data,idChart);
				
			},
			error: function (error) {
				console.log(error)
			}
		});
		
	}

}