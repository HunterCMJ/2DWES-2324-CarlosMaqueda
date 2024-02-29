﻿<?php

	
	$user=$_SESSION['user'];
	$id=$_SESSION['id'];

?>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bienvenido a MovilMAD</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
	<h1>Servicio de ALQUILER DE E-CARS</h1>

	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Menú Usuario - OPERACIONES </div>
			<div class="card-body">


				<B>Bienvenido/a:</B><?php echo $user?>  <BR><BR>
				<B>Identificador Cliente:</B><?php echo $id?>  <BR><BR>


				<!--Formulario con botones -->

				<input type="button" value="Alquilar Vehículo" onclick="window.location.href='./movalquilar_controller'" class="btn btn-warning disabled">
				<input type="button" value="Consultar Alquileres" onclick="window.location.href='./movconsultar.php'" class="btn btn-warning disabled">
				<input type="button" value="Devolver Vehículo" onclick="window.location.href='./movdevolver_controller.php'" class="btn btn-warning disabled">
				</br></br>



				<BR><a href="./movlogout_controller.php">Cerrar Sesión</a>
			</div>



</body>

</html>