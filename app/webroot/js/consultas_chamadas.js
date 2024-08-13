function callConsultas(){
    $.ajax({
		method: "GET",
		url: "consultas/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}