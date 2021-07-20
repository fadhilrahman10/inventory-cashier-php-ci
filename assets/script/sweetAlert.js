function sweetAlert(url) {
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText:
			"<a href='" +
			url +
			"' class='text-decoration-none text-white'> Yes, delete it! </a>",
	});
}
