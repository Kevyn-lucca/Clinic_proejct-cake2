function HomePage() {
	$.ajax({
		method: "GET",
		url: "medicos/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}

function GetMedicsAdd() {
	$.ajax({
		method: "GET",
		url: "medicos/add/",
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function GetMedicsEdit(id) {
	$.ajax({
		method: "GET",
		url: `medicos/edit/${id}`,
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function editMedic(id) {
	let formdata = $("#MedicEditForm").serialize();
	$.ajax({
		method: "POST",
		url: `medicos/edit/${id}`,
		data: formdata,

		success: () => {
			$("#MainModal").modal("toggle");
			HomePage();
		},
	});
}

function addMedic() {
	let formdata = $("#MeddicAddForm").serialize();
	$.ajax({
		method: "POST",
		url: "medicos/add/",
		data: formdata,

		success: () => {
			$("#MainModal").modal("toggle");
			HomePage();
		},
	});
}

function deleteMedic(id){
	$.ajax({
		method: "DELETE",
		url: `medicos/delete/${id}`,
		success: () =>{
			HomePage()
		}
	})
}