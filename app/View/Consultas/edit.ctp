<h1 class="text-center">Editar Convenio</h1>
<form id="ConvsEditForm">
    <div class="mb-3">
        <label for="nome">Nome:</label>
        <input class="form-control"  placeholder="<?= $convenios['Convenios']['nome']?>" type="text" id="nome" name="nome" required>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="ConvesEdit(<?= $convenios['Convenios']['id']?>)">Adicionar</button>
</form>