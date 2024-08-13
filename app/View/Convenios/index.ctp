<div class="mb-4">
    <button type="button" class="btn btn-primary" onclick="ConvesCallAdd()">
        Add
    </button>
</div>
<div style="overflow: auto;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($consultas as $consulta): ?>
    <tr>
        <th scope="row"><?= h($consulta['Consulta']['id']) ?></th>
        <td><?= h($consulta['Paciente']['nome']) ?></td>
        <td><?= h($consulta['Medico']['nome']) ?></td>
        <td><?= h($consulta['Consulta']['data']) ?></td>
        <td><?= h($consulta['Consulta']['hora']) ?></td>
        <td>
            <button class="btn btn-danger" onclick="ConvesDelete(<?= h($consulta['Consulta']['id']) ?>)">
                Delete
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetConvesEdit(<?= h($consulta['Consulta']['id']) ?>)">
                Editar
            </button>
        </td>
    </tr>
<?php endforeach; ?>
   
  </tbody>
</table>
</div>