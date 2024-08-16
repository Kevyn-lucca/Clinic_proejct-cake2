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
	let nomeEdit = $("#nome").val().trim();
    if (!nomeEdit) {
        return false; 
    } else {
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
    let nome = $("#nome").val().trim();
    if (!nome) {
        return false; 
    } else {
        let formdata = $("#ConvesAddForm").serialize();   
        $.ajax({
            method: "POST",
            url: "convenios/add/",
            data: formdata,
            success: () => {
                $("#MainModal").modal("toggle"); // Fecha o modal
                ConvesPage(); // Atualiza a página ou executa alguma função
            }
        });
    }
}
