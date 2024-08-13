function ConvesPage() {
	$.ajax({
		method: "GET",
		url: "convenios/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}