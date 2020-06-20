function dashboard() {
	this.datas = null;
	this.runJS = function () {
		
        var me =  this;
        var datas = this.datas;
        daterange('#dashboard_daterange','#dashboard_dateBegin','#dashboard_dateEnd');
		$("#dashboard_daterange").on('change', function (e) {
			$.ajax({
				url: datas.routes.dashboard,
				type: 'POST',
				data: {
					dateBegin: $("#dashboard_dateBegin").val(),
					dateEnd: $("#dashboard_dateEnd").val(),
				},
				dataType: 'JSON',
				success: function (data) {
					$('#sumEvent').text(money_format(data.data.sumEvent));
					$('#sumShopping').text(money_format(data.data.sumShopping));
					$('#sumCost').text(money_format(data.data.sumCost));
					$('#sumSalary').text(money_format(data.data.sumSalary));
					console.log(data)
				},
				error: function (error) {
					console.log(error)
				}
			});
        });
        me.Event();
	},
	this.Event = function () {
		var me =  this;
		var datas = this.datas;
		daterange('#Chart_daterange','#Chart_dateBegin','#Chart_dateEnd');
		me._Ajax(
			datas.routes.getCharEvent,
			$('#Chart_dateBegin').val(),
			$('#Chart_dateEnd').val(),
			'dashboard-chart'
		);
		$("#Chart_daterange").on('change', function (e) {
			
			me._Ajax(
				datas.routes.getCharEvent,
				$('#Chart_dateBegin').val(),
				$('#Chart_dateEnd').val(),
				'dashboard-chart'
			);
        });
	
	},
	this.runChar=function(data,id){
		$(window).resize(function () {
			EventDoughnut.resize();
		});
		var EventDoughnut = echarts.init(document.getElementById(id));
		var option = {
			textStyle: {
				fontFamily: "Tahoma,Arial"
			},
			// Add title
			title: {
				text: 'Biểu đồ tỷ lệ',
				subtext: "Tổng : "+money_format(data.sumTotal),
				x: 'center',
			},
			// Add legend
			legend: {
				orient: 'vertical',
				x: 'left',
				data: data.lable
			},
			// Add custom colors
			color: data.color,
			// Display toolbox
			toolbox: {
				show: true,
				orient: 'horizontal',
				feature: {
					dataView: {
						show: true,
						readOnly: false,
						title: 'Xem dữ liệu',
						lang: [
                            'Xem dữ liệu biểu đồ', 
                            'Đóng', 
                            'Cập Nhật'
                        ]
					},
					restore: {
						show: true,
						title: "Làm Mới"
					},
					saveAsImage: {
						show: true,
						title: 'Lưu',
						lang: ['Save']
					}
				}
			},
			series: [{
				name: "Trình Duyệt",
                type: 'pie',
				avoidLabelOverlap: true,
				// radius: ['50%', '70%'],
				center: ['50%', '56%'],
				itemStyle: {
					normal: {
						label: {
							show: true,
						},
						labelLine: {
							show: true
						}
					},
					emphasis: {
						label: {
							show: true,
							formatter: '{b}' + " : " + '{c} ({d}%)',
							position: 'center',
							textStyle: {
								fontSize: '15',
								fontWeight: '500',
							}
						}
					}
				},
				data:data.data,
				
			}]
		};
		EventDoughnut.setOption(option);
	}
	this._Ajax=function(url,begin,end,id){
		var me = this;
		var idChart = id;
		$.ajax({
			url: url,
			type: 'GET',
			data: {
				dateBegin: begin,
				dateEnd: end,
			},
			dataType: 'JSON',
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