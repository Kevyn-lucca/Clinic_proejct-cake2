function callConsultas(){
    $.ajax({
		method: "GET",
		url: "consultas/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}


function GetConsultasEdit(id) {
	$.ajax({
		method: "GET",
		url: `Consultas/edit/${id}`,
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function ConsultasEdit(id){
	let formdata = $("#ConvsEditForm").serialize();
	$.ajax({
		method: "POST",
		url: `Consultas/edit/${id}`,
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			callConsultas();
		},
	});
}

function ConsultasDelete(id){
	$.ajax({
		method: "POST",
		url: `Consultas/delete/${id}`,
		success: () => {
			callConsultas()
		}
	})
}


function ConsultasRebook(id){
	$.ajax({
		method: "POST",
		url: `Consultas/rebook/${id}`,
		success: () => {
			callConsultas()
		}
	})
}



function ConsultasAdd(){
	$.ajax({
		method: "GET",
		url: "Consultas/add/",
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		}
	})
}


function addConsultas() {
	let formdata = $("#ConsultasAddForm").serialize();
	$.ajax({
		method: "POST",
		url: "Consultas/add/",
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			callConsultas();
		},
	});
}