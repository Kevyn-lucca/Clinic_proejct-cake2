<!DOCTYPE html>
<html>
<head>
	<title>Sistema clinica</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="app/webroot/css/material.css" rel="stylesheet" />
<link href="app/webroot/css/demo.css" rel="stylesheet" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<div class="wrapper ">
<div class="sidebar" data-color="purple" data-background-color="white">
<div class="logo"><a  class="simple-text logo-normal">
Sistema clinica
</a></div>
<div class="sidebar-wrapper">
<ul class="nav">
<li class="nav-item">
<a class="nav-link Button-nav" onclick="HomePage()">
<i class="fas fa-user-md"></i>
<p>Doutores</p>
</a>
</li>
<li class="nav-item ">
<a onclick="PaciPage()" class="nav-link Button-nav">
<i class="fa-solid fa-user"></i>
<p>Pacientes</p>
</a>
</li>
<li class="nav-item ">
<a onclick="callConsultas()" class="nav-link Button-nav">
<i class="fa-solid fa-clock"></i>
<p>Consultas</p>
</a> 
</li>
<li class="nav-item ">
<a onclick="tipoPage()" class="nav-link Button-nav" >
<i class="fa-solid fa-book-open"></i>
<p>Tipos de consulta</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link  Button-nav" onclick="ConvesPage()">
<i class="fa-solid fa-globe"></i>
<p>Convenios</p>
</a>
</li>
</ul>
</div>
</div>
	<main class="main-panel mt-4">
	<section>
	<?php echo $this->fetch('content'); ?>
	</section >
	</main>
	<script src="https://code.jquery.com/jquery-3.7.1.js"
		integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"
		integrity="sha256-u0L8aA6Ev3bY2HI4y0CAyr9H8FRWgX4hZ9+K7C2nzdc=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
	<script src="app/webroot/js/doutor_chamada.js"></script>
	<script src="app/webroot/js/convenio_chamadas.js"></script>
	<script src="app/webroot/js/consultas_chamadas.js"></script>
	<script src="app/webroot/js/paciente_chamadas.js"></script>
	<script src="app/webroot/js/tipos_chamadas.js"></script>
</body>
</html>