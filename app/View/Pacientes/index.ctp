<div class="mb-4">
    <button type="button" class="btn btn-primary" onclick="PaciCallAdd()">
        Add
    </button>
</div>
<div style="overflow: auto;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Crm</th>
      <th scope="col">Date</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pacientes as $paciente): ?>
    <tr>
      <th scope="row"><?= $paciente['Paciente']['id']?></th>
      <td><?= h($paciente['Paciente']['nome']) ?></td>
      <td><?= h($paciente['Paciente']['nascimento']) ?></td>
      <td><?= h($paciente['Convenios']['nome']) ?></td>
      <td>         
        <button class="btn btn-danger" onclick="PaciDelete(<?= $paciente['Paciente']['id']?>)">
            Delete
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetPaciEdit(<?=$paciente['Paciente']['id']?>)">
            Editar
        </button></td>
        <?php endforeach; ?>
    </tr>
   
  </tbody>
</table>
</div>