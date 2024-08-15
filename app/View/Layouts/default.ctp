<!DOCTYPE html>
<html>
<head>
	<title>TESTE </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="app/webroot/css/material.css" rel="stylesheet" />
<link href="app/webroot/css/demo.css" rel="stylesheet" />
</head>
<body>
<header>
<nav>
<div class="wrapper ">
<div class="sidebar" data-color="purple" data-background-color="white">
<div class="logo"><a  class="simple-text logo-normal">
Creative Tim
</a></div>
<div class="sidebar-wrapper">
<ul class="nav">
<li class="nav-item active  ">
<a class="nav-link" href="">
<i class="material-icons">dashboard</i>
<p>Dashboard</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link">
<i class="material-icons">person</i>
<p>User Profile</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link">
<i class="material-icons">content_paste</i>
<p>Table List</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link" >
<i class="material-icons">library_books</i>
<p>Typography</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link">
<i class="material-icons">bubble_chart</i>
<p>Icons</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link">
<i class="material-icons">location_ons</i>
<p>Maps</p>
</a>
</li>
<li class="nav-item ">
<a class="nav-link">
<i class="material-icons">notifications</i>
<p>Notifications</p>
</a>
</li>
<li class="nav-item ">
<button class="btn" onclick="ConvesPage()">
<a class="nav-link" >
<i class="material-icons">language</i>
<p>teste Convenio</p>
</button>
</a>
</li>
</ul>
</div>
</div>
  <!-- <div class="">
    <button onclick="HomePage()"  class="btn navbar-brand text-white" >
      <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
	   Teste
</button>

<button onclick="callConsultas()">teste Consultas</button>
<button onclick="PaciPage()">teste Pacientes</button>
<button onclick="tipoPage()">teste Tipos de consulta</button>
  </div> -->
</nav>


</header>
	<main class="m-4">
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