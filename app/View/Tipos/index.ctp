<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-info">
<h4 class="card-title ">Tipos de consulta</h4>
</div>
<div class="card-body">
<div class="mb-4">
    <button type="button" class="btn btn-dark" onclick="tipoCallAdd()">
        Adicionar
    </button>
</div>
<div class="table-responsive">
<table class="table">
<thead class=" text-primary">
<th>
ID
</th>
<th>
Nome
</th>
<th>
Editar
</th>
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
