<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Consultas Agendadas</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <button type="button" class="btn btn-dark" onclick="ConsultasAdd()">
                                Adicionar
                            </button>
                        </div>
                        <?php if (!empty($consultas)): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Paciente</th>
                                            <th>Médico</th>
                                            <th>Tipo de Consulta</th>
                                            <th>Convênio</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($consultas as $consulta): ?>
                                            <?php if (isset($consulta['Consulta'])): ?>
                                                <?php
                                                $dataAmericana = $consulta['Consulta']['data'];
                                                $data = new DateTime($dataAmericana);
                                                $dataBrasileira = $data->format('d/m/Y'); ?>
                                                <tr class="<?= $consulta['Consulta']['marcado'] ? '' : 'table-warning' ?>">
                                                    <th scope="row"><?php echo h($consulta['Consulta']['id']); ?></th>
                                                    <td><?php echo h($consulta['Paciente']['paciente_nome']); ?></td>
                                                    <td><?php echo h($consulta['Medico']['medico_nome']); ?></td>
                                                    <td><?php echo h($consulta['Tipo']['tipo_nome']); ?></td>
                                                    <td><?php echo h($consulta['Convenio']['convenio_nome']); ?></td>
                                                    <td><?php echo h($dataBrasileira);?></td>
                                                    <td><?php echo h($consulta['Consulta']['hora']); ?></td>
                                                    <td>
                                                        <?php if ($consulta['Consulta']['marcado']): ?>
                                                            <button class="btn btn-danger" onclick="ConsultasToggle(<?= h($consulta['Consulta']['id']) ?>)">
                                                                Desmarcar
                                                            </button>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetConsultasEdit(<?= h($consulta['Consulta']['id']) ?>)">
                                                                Editar
                                                            </button>
                                                        <?php else: ?>
                                                            <button class="btn btn-success" onclick="ConsultasToggle(<?= h($consulta['Consulta']['id']) ?>)">
                                                                Remarcar
                                                            </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>Nenhuma consulta agendada encontrada.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
