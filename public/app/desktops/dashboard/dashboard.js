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
	}
	this.Event = function () {
        daterange('#Event_daterange','#Event_dateBegin','#Event_dateEnd');
		$(window).resize(function () {
			EventDoughnut.resize();
		});
		// Chart User Sex
		var EventDoughnut = echarts.init(document.getElementById('event-chart'));
		var option = {
			textStyle: {
				fontFamily: "Tahoma,Arial"
			},
			// Add title
			title: {
				text: 'Biểu đồ tỷ lệ',
				subtext: "Tổng : " + (parseInt(50) + parseInt(50)),
				x: 'center',
			},
			// Add legend
			legend: {
				orient: 'vertical',
				x: 'left',
				data: ['Đám Ma', 'Đám Cưới','Đám hỏi']
			},
			// Add custom colors
			color: ['#00008B', '#DC143A'],
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
				data: [
                    {
					    value: 50,
					    name: 'Đám Ma'
                    },
                    {
					    value: 50,
					    name: 'Đám Cưới'
                    }, 
                    {
                        value: 50,
                        name: 'Đám hỏi'
                    }, 
                ]
			}]
		};
		EventDoughnut.setOption(option);
	}
}