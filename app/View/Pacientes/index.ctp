
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
    <button type="button" class="btn btn-dark" onclick="PaciCallAdd()">
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
Convenio
</th>
<th>
Nascimento
</th>
<th>
Editar
</th>
</thead>
<tbody>
<?php foreach ($pacientes as $paciente): ?>
    <tr>
      <th scope="row"><?= $paciente['Paciente']['id']?></th>
      <td>
      <?= h($paciente['Paciente']['nome'])?>
      </td>
      <td><?=h($paciente['Convenios']['nome'])?></td>
      <td><?=h($paciente['Paciente']['nascimento'])?></td>
      <td>         
        <button class="btn btn-danger" onclick="PaciDelete(<?= $paciente['Paciente']['id']?>)">
            Deletar
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="GetPaciEdit(<?= $paciente['Paciente']['id']?>)">
            Editar
        </button></td>
        <?php endforeach; ?>
    </tr>
</tbody>