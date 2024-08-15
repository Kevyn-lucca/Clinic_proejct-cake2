<h1 class="text-center">Adicionar Paciente</h1>
<form id="PacienteEditForm">
    <div class="mb-3">
        <label for="nome">Nome:</label>
        <input class="form-control" type="text" id="nome" name="nome" required>
    </div>
    <div class="mb-3">
        <label for="convenio">Convênio:</label>
        <select class="form-control" required name="convenio_id" id="convenio_id">
            <?php foreach ($Convenios as $convenio): ?>
                <option value="<?= $convenio['Convenios']['id'] ?>"><?= $convenio['Convenios']['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="crm">Data de nascimento:</label>
        <input type="date" class="form-control" id="nascimento" name="nascimento"></input>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="PaciEdit(<?= $paciente['Paciente']['id']?>)">Editar</button>
</form>
