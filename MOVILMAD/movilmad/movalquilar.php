<?php
if (isset($_SESSION['nombre'])) {
	session_unset();
	session_destroy();
	
	
}else{
	session_start();
	$user = $_SESSION['nombre'];
	$id = $_SESSION['idcliente'];
	
}

//include "./controller/movalquilar_controller.php";

if (isset($_GET['coches'])) {
	
	$coches = unserialize(urldecode($_GET['coches']));
}

?>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bienvenido a MovilMAD</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
	<h1>Servicio de ALQUILER DE E-CARS</h1>


	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
			<div class="card-body">


				<!-- INICIO DEL FORMULARIO -->
				<form action="./controller/movalquilar_controller.php" method="post">

					<B>Bienvenido/a:</B> <?php echo $user ?> <BR><BR>
					<B>Identificador Cliente:</B> <?php echo $id ?> <BR><BR>

					<B>Vehiculos disponibles en este momento:</B> <BR><BR>

					<B>Matricula/Marca/Modelo: </B><select name="vehiculos" class="form-control">
						<?php
						// Iteramos sobre los coches y generamos las opciones del select
						foreach ($coches as $coche) {
							echo "<option value='" . $coche['matricula'] . "'>" . $coche['matricula'] . "</option>";
						}
						?>
					</select>


					<BR> <BR><BR><BR><BR><BR>
					<div>
						<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
						<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
						<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
					</div>
				</form>
				<!-- FIN DEL FORMULARIO -->
</body>

</html>