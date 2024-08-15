<div class="container">
<div class="mb-4">
    <button type="button" class="btn btn-primary" onclick="ConsultasAdd()">
        Add
    </button>
</div>
    <h2>Consultas Agendadas</h2>
    <?php if (!empty($consultas)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Tipo de Consulta</th>
                    <th>Convênio</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <?php if (isset($consulta['Consulta'])): // Verifica se é uma consulta agendada ?>
                        <tr>
                            <td><?php echo h($consulta['Consulta']['id']); ?></td>
                            <td><?php echo h($consulta['Paciente']['paciente_nome']); ?></td>
                            <td><?php echo h($consulta['Medico']['medico_nome']); ?></td>
                            <td><?php echo h($consulta['Tipo']['tipo_nome']); ?></td>
                            <td><?php echo h($consulta['Convenio']['convenio_nome']); ?></td>
                            <td><?php echo h($consulta['Consulta']['data']); ?></td>
                            <td><?php echo h($consulta['Consulta']['hora']); ?></td>
                            <td>
                    <button class="btn btn-danger" onclick="ConsultasDelete(<?= h($consulta['Consulta']['id']) ?>)">
                        Delete
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetConsultasEdit(<?= h($consulta['Consulta']['id']) ?>)">
                        Editar
                    </button>
                </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma consulta agendada encontrada.</p>
    <?php endif; ?>

    <h2>Consultas Desmarcadas</h2>
    <?php if (!empty($consultas)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Tipo de Consulta</th>
                    <th>Convênio</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <?php if (isset($consulta['ConsultaDesmarcada'])): // Verifica se é uma consulta desmarcada ?>
                        <tr>
                            <td><?php echo h($consulta['ConsultaDesmarcada']['id']); ?></td>
                            <td><?php echo h($consulta['Paciente']['paciente_nome']); ?></td>
                            <td><?php echo h($consulta['Medico']['medico_nome']); ?></td>
                            <td><?php echo h($consulta['Tipo']['tipo_nome']); ?></td>
                            <td><?php echo h($consulta['Convenio']['convenio_nome']); ?></td>
                            <td><?php echo h($consulta['ConsultaDesmarcada']['data']); ?></td>
                            <td><?php echo h($consulta['ConsultaDesmarcada']['hora']); ?></td>
                            <td>
                    <button class="btn btn-danger" onclick="ConsultasRebook(<?= h($consulta['ConsultaDesmarcada']['id']) ?>)">
                        Delete
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetConsultasEdit(<?= h($consulta['ConsultaDesmarcada']['id']) ?>)">
                        Editar
                    </button>
                </td>       
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma consulta desmarcada encontrada.</p>
    <?php endif; ?>
</div>