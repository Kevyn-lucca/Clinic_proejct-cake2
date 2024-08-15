<div class="mb-4">
    <button type="button" class="btn btn-primary" onclick="tipoCallAdd()">
        Add
    </button>
</div>
<div style="overflow: auto;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th> <!-- Corrigi o nome da coluna -->
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tipos as $tipos): ?>
    <tr>
      <th scope="row"><?= $tipos['Tipos']['id']?></th>
      <td><?= h($tipos['Tipos']['nome']) ?></td>
      <td>
        <button class="btn btn-danger" onclick="tipoDelete(<?= $tipos['Tipos']['id']?>)">
            Delete
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetTipoEdit(<?= $tipos['Tipos']['id']?>)">
            Editar
        </button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
