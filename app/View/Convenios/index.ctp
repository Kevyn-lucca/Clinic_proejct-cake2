<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-info">
<h4 class="card-title ">Pacientes</h4>
</div>
<div class="card-body">
<div class="mb-4">
    <button type="button" class="btn btn-dark" onclick="ConvesCallAdd()">
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