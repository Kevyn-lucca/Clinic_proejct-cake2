function ConvesPage() {
	$.ajax({
		method: "GET",
		url: "convenios/index",
		success: (response) => {
			$("#MainContent").html(response);
		},
	});
}

function GetConvesEdit(id) {
	$.ajax({
		method: "GET",
		url: `convenios/edit/${id}`,
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		},
	});
}

function ConvesEdit(id){
	let formdata = $("#ConvsEditForm").serialize();
	$.ajax({
		method: "POST",
		url: `convenios/edit/${id}`,
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			ConvesPage();
		},
	});
}

function ConvesDelete(id){
	$.ajax({
		method: "DELETE",
		url: `convenios/delete/${id}`,
		success: () => {
			ConvesPage()
		}
	})
}

function ConvesCallAdd(){
	$.ajax({
		method: "GET",
		url: "convenios/add/",
		success: (response) => {
			$("#MainModal").modal("toggle");
			$("#MainModalContent").html(response);
		}
	})
}


function addConves() {
	let formdata = $("#ConvesAddForm").serialize();
	$.ajax({
		method: "POST",
		url: "convenios/add/",
		data: formdata,
		success: () => {
			$("#MainModal").modal("toggle");
			ConvesPage();
		},
	});
}