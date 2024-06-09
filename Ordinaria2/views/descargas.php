

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		
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

					<B>Nombre Cliente:</B>  <BR>
					<B>Dirección:</B>  <BR>
					<B>Ciudad </B>  <BR>
					<B>País:</B> <BR><BR>

					<label for="cancion"><B>Selecciona canción: </B></label>

					<select name="cancion" class="form-control">
						

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