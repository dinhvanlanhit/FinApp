function payment(){
    this.datas = null;
    this.runJS = function(){
        var datas = this.datas;
		var table = $("#payment-table").DataTable({
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
						dateBegin: $("#dateBegin").val(),
						dateEnd: $("#dateEnd").val(),
						search: $("#search").val(),
					});
				}
			},
			order: [0, "desc"],
			columns: [
				{
				title: "#",
				data: "created_at",
				name: "created_at",
				className: "text-center",
					render: function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{
					title: "Gói Sử Dụng",
					data: "name",
					name: "name",
					className: "text-center",
                },
                {
					title: "Số Tiền",
					data: "amount",
					name: "amount",
					className: "text-center",
					render: function (data, type, row, meta) {
						return '<b class="">' + money_format(data) + ' VNĐ</b>';
					}
				},
				{
					title: "Ghi Chú",
					data: "note",
					name: "note",
					className: "text-center",
                }
                ,{
					title: "Ngày",
					data: "date",
					name: "date",
					className: "text-center",
                },
                {
					title: "Ngày Cập Nhật",
					data: "created_at",
					name: "created_at",
					className: "text-center",
				}
			],
			drawCallback: function (settings) {
                buttonloading(".formSearch", false);
            }
		});
		$("#formSearch").on('submit', function (e) {
			e.preventDefault();
			buttonloading(".formSearch", true);
			table.ajax.reload();
		});
    }
}