function tipoPage() {
	$.ajax({
		method: "GET",
		url: "tipos/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}

function GetTipoEdit(id) {
	$.ajax({
		method: "GET",
		url: `tipos/edit/${id}`,
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function tipoEdit(id) {
	let nomeEdit = $("#nomeTipo").val().trim();
    if (!nomeEdit) {
        alert("Por favor, preencha o campo Nome."); 
        return false; 
    } else {
	let formdata = $("#TipoEditForm").serialize();
	$.ajax({
		method: "POST",
		url: `tipos/edit/${id}`,
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			tipoPage();
		},
	});
}
}
function tipoDelete(id) {
	$.ajax({
		method: "DELETE",
		url: `tipos/delete/${id}`,
		success: () => {
			tipoPage();
		},
	});
}

function tipoCallAdd() {
	$.ajax({
		method: "GET",
		url: "tipos/add/",
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function addTipo() {
	let nomeEdit = $("#nomeTipo").val().trim();
    if (!nomeEdit) {
        alert("Por favor, preencha o campo Nome."); 
        return false; 
    } else {
	let formdata = $("#TipoAddForm").serialize();
	$.ajax({
		method: "POST",
		url: "tipos/add/",
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			tipoPage();
		},
	});
}
}