$(document).ready(function () {
	get_data();
});

$("#transactions").click(function (e) {
	var bayar = $("#bayar").val();
	var kembali = $("#kembali").val();
	if (bayar == 0 || kembali < 0) {
		Swal.fire({
			type: "error",
			title: "Oops...",
			text: "Please check payment!",
		});
	} else {
		Swal.fire({
			title: "<div class='product-subtitle'>Transactions Success</div>",
			text: "Print your struk",
			type: "success",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Print!",
		}).then((result) => {
			if (result.value) {
				printContent("content");
				// payment();
				location.href = "kasir.html";
			} else {
				payment();
			}
		});
	}
});

$("#bayar").keyup(function () {
	var bayar = $("#bayar").val();
	var str = $("#total").text().split(",");
	var result = "";
	for (let i = 0; i < str.length; i++) {
		result = result + str[i];
	}
	var total = parseInt(bayar) - parseInt(result);
	if (isNaN(total)) {
		$("#kembali").val(0);
	} else {
		$("#kembali").val(total);
	}
});

function template(data) {
	var baris = "";
	var barang = "";
	var jumlah_barang = "";
	var harga = "";

	var total = 0;
	for (let i = 0; i < data.length; i++) {
		var subtotal = data * data;
		baris +=
			'<tr class="product-subtitle">' +
			'<th scope="row">' +
			"data" +
			"</th>" +
			"<td>" +
			"data" +
			"</td>" +
			'<td width="50">' +
			'<form action="" class="form-inline justify-content-center">' +
			'<a href="" class="btn">' +
			'<i class="bi bi-dash-square-fill text-muted"></i>' +
			"</a>" +
			'<input type="number" value="1" id="jumlah" class="form-control col-6 text-center"/>' +
			'<a href="" class="btn">' +
			'<i class="bi bi-plus-square-fill text-primary"></i>' +
			"</a>" +
			"</form>" +
			"</td>" +
			"<td>" +
			"data" +
			"</td>" +
			"<td>" +
			"subtotal" +
			"</td>" +
			"<td>" +
			'<a href="">' +
			'<i class="bi bi-x-circle-fill text-danger"></i>' +
			"</a>" +
			"</td>" +
			"</tr>";

		barang += '<div class="product-subtitle">' + "data" + "</div>";
		jumlah_barang += '<div class="product-subtitle">' + "data" + "</div>";
		harga += '<div class="product-subtitle">' + "data" + "</div>";

		total += subtotal;
	}
	$("#barang").html(barang);
	$("#jumlah").html(jumlah_barang);
	$("#harga").html(harga);
	$("#total").html(total);
	$("#total_print").html(total);
	$("#cart").html(baris);
}

// $("#add_data").click(function () {
// 	var id_barang = $("#id_barang").val();
// 	// 	var id_customer = $("#id_customer").val();
// 	console.log(id_barang);
// });

// function add_data() {
// 	var id_barang = $("#barang").val();
// 	var id_customer = $("#customer").val();
// 	console.log(id_barang);
// 	// $.ajax({
// 	// 	type: "POST",
// 	// 	data: "id_barang=" + id_barang + "&&id_customer=" + id_customer,
// 	// 	url: "http://localhost/berkah/cashier/add",
// 	// 	dataType: "json",
// 	// 	success: function () {
// 	// 		get_data();
// 	// 	},
// 	// });
// }

function get_data() {
	$.ajax({
		type: "POST",
		url: "http://localhost/berkah/cashier/get_data",
		dataType: "json",
		success: function (data) {
			console.log(data);
			// template(data);
		},
	});
}

function plus(no_penjualan) {
	$.ajax({
		type: "POST",
		data: "no_penjualan=" + no_penjualan,
		url: "http://localhost/berkah/cashier/plus",
		dataType: "json",
		success: function () {
			get_data();
		},
	});
}

function minus(no_penjualan) {
	$.ajax({
		type: "POST",
		data: "no_penjualan=" + no_penjualan,
		url: "http://localhost/berkah/cashier/minus",
		dataType: "json",
		success: function () {
			get_data();
		},
	});
}

function hapus(no_penjualan) {
	$.ajax({
		type: "POST",
		data: "no_penjualan=" + no_penjualan,
		url: "http://localhost/berkah/cashier/hapus",
		dataType: "json",
		success: function () {
			get_data();
		},
	});
}

function payment() {
	$.ajax({
		type: "POST",
		url: "",
		dataType: "json",
		success: function () {
			get_data();
		},
	});
}

function printContent(el) {
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
