
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-info">
<h4 class="card-title ">Doutores</h4>
</div>
<div class="card-body">
<div class="mb-4">
    <button type="button" class="btn btn-dark" onclick="GetMedicsAdd()">
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
CRM
</th>
<th>
Data
</th>
<th>
Editar
</th>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetMedicsEdit(<?= $medic['Medics']['id']?>)">
            Editar
        </button></td>
        <?php endforeach; ?>
    </tr>
</tbody>