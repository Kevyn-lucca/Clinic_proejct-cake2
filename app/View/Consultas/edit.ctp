<h1 class="text-center">Editar Consulta</h1>
<form id="ConsultasEditForm">
    <div class="mb-3">
        <label for="paciente_id">Paciente:</label>
        <select class="form-control" required name="paciente_id" id="paciente_id">
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['Paciente']['id'] ?>" <?= isset($consultas['Consulta']['paciente_id']) && $consultas['Consulta']['paciente_id'] == $paciente['Paciente']['id'] ? 'selected' : '' ?>>
                    <?= h($paciente['Paciente']['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="doutor_id">Médico:</label>
        <select class="form-control" required name="doutor_id" id="doutor_id">
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['Medics']['id'] ?>" <?= isset($consultas['Consulta']['doutor_id']) && $consultas['Consulta']['doutor_id'] == $medico['Medics']['id'] ? 'selected' : '' ?>>
                    <?= h($medico['Medics']['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="tipo_id">Tipo de Consulta:</label>
        <select class="form-control" required name="tipo_id" id="tipo_id">
            <?php foreach ($tipos as $tipo): ?>
                <option value="<?= $tipo['Tipos']['id'] ?>" <?= isset($consultas['Consulta']['tipo_id']) && $consultas['Consulta']['tipo_id'] == $tipo['Tipos']['id'] ? 'selected' : '' ?>>
                    <?= h($tipo['Tipos']['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="convenio_id">Convênio:</label>
        <select class="form-control" required name="convenio_id" id="convenio_id">
            <?php foreach ($convenios as $convenio): ?>
                <option value="<?= $convenio['Convenios']['id'] ?>" <?= isset($consultas['Consulta']['convenio_id']) && $consultas['Consulta']['convenio_id'] == $convenio['Convenios']['id'] ? 'selected' : '' ?>>
                    <?= h($convenio['Convenios']['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="data_consulta">Data da Consulta:</label>
        <input class="form-control" type="date" id="data_consulta" name="data_consulta" value="<?= h($consultas['Consulta']['data_consulta']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="hora">Hora da Consulta:</label>
        <input class="form-control" type="time" id="hora" name="hora" value="<?= h($consultas['Consulta']['hora']) ?>" required>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="ConsultasEdit(<?= h($consultas['Consulta']['id']) ?>)">Editar</button>
</form>