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
	let formdata = $("#ConsultasEditForm").serialize();
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

function  ConsultasToggle(id){
	$.ajax({
		method: "POST",
		url: `Consultas/toggle/${id}`,
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
    let paciente = $("#paciente_id").val().trim();
    let doutor = $("#doutor_id").val().trim();
    let tipo = $("#tipo_id").val().trim();
    let convenio = $("#convenio_id").val().trim();
    let dataConsulta = $("#data_consulta").val().trim();
    let hora = $("#hora").val().trim();

    // Check if all required fields are filled
    if (!paciente || !doutor || !tipo || !convenio || !dataConsulta || !hora) {
        alert("Por favor, preencha todos os campos obrigatórios.");
        return false;
    } else {
        let formdata = $("#ConsultasAddForm").serialize();
        $.ajax({
            method: "POST",
            url: "Consultas/add/",
            data: formdata,
            success: () => {
                $("#MainModal").modal("toggle");
                callConsultas();  // Assuming this function refreshes the consultations list
            }
        });
    }
}

