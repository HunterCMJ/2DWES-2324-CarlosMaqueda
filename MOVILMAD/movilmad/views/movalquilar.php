<?php

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
			<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
			<div class="card-body">


				<!-- INICIO DEL FORMULARIO -->
				<form action="./movalquilar_controller.php" method="post">

					<B>Bienvenido/a:</B> <?php echo $user ?> <BR><BR>
					<B>Identificador Cliente:</B> <?php echo $id ?> <BR><BR>

					<B>Vehiculos disponibles en este momento:</B> <BR><BR>

					<B>Matricula/Marca/Modelo: </B> 
					
					<select name="vehiculos" class="form-control">
						<?php
						// Iteramos sobre los coches y generamos las opciones del select
						foreach ($coches as $coche) {
							echo "<option value=$coche[matricula],$coche[preciobase]>$coche[matricula] || $coche[marca] $coche[modelo] || $coche[preciobase]€</option>";
						}
						?>
					</select>


					<BR> <BR>
					<div>
						<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
						<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
						<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled"><br><br>
					</div>
					<a href="./movwelcome_controller.php">Volver</a>
				</form>
				<!-- FIN DEL FORMULARIO -->
</body>

</html>