<h1 class="text-center">Editar Medico</h1>
<form id="MedicEditForm">
    <div class="mb-3">
        <label for="nome">Nome:</label>
        <input class="form-control" type="text" id="nome" name="nome" required>
    </div>
    <div class= "mb-3">
        <label for="crm">CRM:</label>
        <input class="form-control" id="crm" name="crm"></input>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="editMedic()">Adicionar</button>
</form>