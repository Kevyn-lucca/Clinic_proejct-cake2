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
  <?php foreach ($convenios as $convenio): ?>
    <tr>
        <th scope="row"><?= h($convenio['Convenios']['id']) ?></th>
        <td><?= h($convenio['Convenios']['nome']) ?></td>
        <td>
            <button class="btn btn-danger" onclick="ConvesDelete(<?= h($convenio['Convenios']['id']) ?>)">
                Delete
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetConvesEdit(<?= h($convenio['Convenios']['id']) ?>)">
                Editar
            </button>
        </td>
    </tr>
<?php endforeach; ?>
   
  </tbody>
</table>
</div>