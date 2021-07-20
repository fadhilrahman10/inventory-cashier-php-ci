$(document).ready(function () {
	$("#tabel").DataTable({
		dom: "Bfrtip",
		buttons: ["print"],
		paging: false,
		ordering: false,
		info: false,
	});
});
