<h1 class="text-center">Adicionar Consulta</h1>
<form id="ConsultasAddForm">
    <div class="mb-3">
        <label for="paciente_id">Paciente:</label>
        <select class="form-control" required name="paciente_id" id="paciente_id">
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['Paciente']['id'] ?>"><?= $paciente['Paciente']['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="doutor_id">Médico:</label>
        <select class="form-control" required name="doutor_id" id="doutor_id">
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['Medics']['id'] ?>"><?= $medico['Medics']['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="tipo_id">Tipo de Consulta:</label>
        <select class="form-control" required name="tipo_id" id="tipo_id">
            <?php foreach ($tipos as $tipo): ?>
                <option value="<?= $tipo['Tipos']['id'] ?>"><?= $tipo['Tipos']['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="convenio_id">Convênio:</label>
        <select class="form-control" required name="convenio_id" id="convenio_id">
            <?php foreach ($convenios as $convenio): ?>
                <option value="<?= $convenio['Convenios']['id'] ?>"><?= $convenio['Convenios']['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="data">Data da Consulta:</label>
        <input class="form-control" type="date" id="data" name="data" required>
    </div>
    <div class="mb-3">
        <label for="hora">Hora da Consulta:</label>
        <input class="form-control" type="time" id="hora" name="hora" required>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="addConsultas()">Adicionar</button>
</form>
