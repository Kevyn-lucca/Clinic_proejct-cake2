<h1 class="text-center">Editar Tipo</h1>
<form id="TipoEditForm">
    <div class="mb-3">
        <label for="nome">Nome:</label>
        <input class="form-control"  placeholder="<?= $tipos['Tipos']['nome']?>" type="text" id="nomeTipo" name="nome" required>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="tipoEdit(<?= $tipos['Tipos']['id']?>)">Adicionar</button>
</form>