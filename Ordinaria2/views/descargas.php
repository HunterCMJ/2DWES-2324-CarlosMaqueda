<?php
$Name = $_SESSION['Name'];
$Address = $_SESSION['Address'];
$City = $_SESSION['City'];
$Country = $_SESSION['Country'];

?>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		table,
		td,
		th {
			margin: 1em;
			border: 2px solid orange;
			
		}
	</style>
	<title>SPOTIFY - IES Leonardo Da Vinci</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Descargar Canciones - SPOTIFY IES Leonardo Da Vinci</div>
			<div class="card-body">



				<!-- INICIO DEL FORMULARIO -->
				<form action="./descargas_controller.php" method="post">

					<B>Nombre Cliente:</B> <?php echo $Name ?> <BR>
					<B>Dirección:</B> <?php echo $Address ?> <BR>
					<B>Ciudad </B> <?php echo $City ?> <BR>
					<B>País:</B> <?php echo $Country ?><BR><BR>

					<label for="cancion"><B>Selecciona canción: </B></label>

					<select name="cancion" class="form-control">
						<?php
						foreach ($resultado as $canciones) {

							echo "<option value=$canciones[id],$canciones[price]> $canciones[track] || $canciones[price] || $canciones[album] || $canciones[artist]</option>";
						} ?>

					</select><br>
					<label for="cantidad"><B>Introduce una cantidad </B></label>
					<input type="number" name="cantidad" id="" value="1" class="form-control"><br>

					<div>
						<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
						<input type="submit" value="Descargar" name="descargar" class="btn btn-warning disabled">
						<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
						<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">

					</div>
					
				</form>
				<!-- FIN DEL FORMULARIO -->
			</div>
		</div>



</body>

</html>