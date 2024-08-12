<div class="mb-4">
    <button type="button" class="btn btn-primary" onclick="GetMedicsAdd()">
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
    <?php foreach ($medics as $medic): ?>
    <tr>
      <th scope="row"><?= $medic['Medics']['id']?></th>
      <td>
      <?= h($medic['Medics']['nome']) ?>
      </td>
      <td><?= $medic['Medics']['crm']?></td>
      <td><?= $medic['Medics']['created']?></td>
      <td>         
        <button class="btn btn-danger" onclick="deleteMedic(<?= $medic['Medics']['id']?>)">
            Delete
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="buscarPostsEdit()">
            Editar
        </button></td>
        <?php endforeach; ?>
    </tr>
   
  </tbody>
</table>
</div>