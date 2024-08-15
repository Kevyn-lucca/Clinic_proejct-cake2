function PaciPage() {
	$.ajax({
		method: "GET",
		url: "pacientes/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}

function GetPaciEdit(id) {
	$.ajax({
		method: "GET",
		url: `pacientes/edit/${id}`,
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function PaciEdit(id){
	let formdata = $("#PacienteEditForm").serialize();
	$.ajax({
		method: "POST",
		url: `pacientes/edit/${id}`,
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			PaciPage();
		},
	});
}

function PaciDelete(id){
	$.ajax({
		method: "DELETE",
		url: `pacientes/delete/${id}`,
		success: () => {
			PaciPage();
		}
	})
}

function PaciCallAdd(){
	$.ajax({
		method: "GET",
		url: "pacientes/add/",
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		}
	})
}




function addPaci() {
	let formdata = $("#PacientesAddForm").serialize();
	$.ajax({
		method: "POST",
		url: "pacientes/add/",
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			PaciPage()
		},
	});
}



