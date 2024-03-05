<<<<<<< HEAD
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
	<title>SPOTIFY - IES Leonardo Da Vinci </title>
	<style>
		table,
		td,
		th {
			margin: 1em;
			border: 2px solid orange;
			width: 3em;
		}
	</style>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>



<body>


	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Consultar Factura - SPOTIFY IES Leonardo Da Vinci</div>
			<div class="card-body">

				<B>Nombre Cliente:</B> <?php echo $Name ?> <BR>
				<B>Dirección:</B> <?php echo $Address ?> <BR>
				<B>Ciudad </B> <?php echo $City ?> <BR>
				<B>País:</B> <?php echo $Country ?><BR>

				<form id="" name="" action="./facturas_controller.php" method="post" class="card-body">

					<B>Fecha Desde: </B> <input type="date" name="Desde"  required class="form-control">
					<B>Fecha Hasta: </B> <input type="date" name="Hasta" required class="form-control">
					<BR>
					<BR>
					<input type="submit" value="Consultar" name="Consultar" class="btn btn-warning disabled">
				</form>
				<div>

					<input type="button" value="Volver" onclick="window.location.href='./inicio_controller.php'" class="btn btn-warning disabled"><BR>
				</div>
				<br>
				<div>
					<?php if (isset($resultado)) { ?>

						<h4>Facturas de <?php echo $Name ?></h3>
							<table>

								<tr>
									<th>Numero Factura</th>
									<th>Fechaa Factura</th>
									<th>Importe total</th>

								</tr>

								<?php foreach ($resultado as $consulta) { ?>
									<tr>
										<?php foreach ($consulta as $key => $value) { ?>

											<td><?php echo $value; ?></td>

									<?php }?>
									</tr>
									<?php } ?>
									

									</tr>
							</table>
						<?php } ?>
				</div>

				<!-- FIN DEL FORMULARIO -->
			</div>



</body>

=======
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
	<title>SPOTIFY - IES Leonardo Da Vinci </title>
	<style>
		table,
		td,
		th {
			margin: 1em;
			border: 2px solid orange;
			width: 3em;
		}
	</style>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>



<body>


	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Consultar Factura - SPOTIFY IES Leonardo Da Vinci</div>
			<div class="card-body">

				<B>Nombre Cliente:</B> <?php echo $Name ?> <BR>
				<B>Dirección:</B> <?php echo $Address ?> <BR>
				<B>Ciudad </B> <?php echo $City ?> <BR>
				<B>País:</B> <?php echo $Country ?><BR>

				<form id="" name="" action="./facturas_controller.php" method="post" class="card-body">

					<B>Fecha Desde: </B> <input type="date" name="Desde"  required class="form-control">
					<B>Fecha Hasta: </B> <input type="date" name="Hasta" required class="form-control">
					<BR>
					<BR>
					<input type="submit" value="Consultar" name="Consultar" class="btn btn-warning disabled">
				</form>
				<div>

					<input type="button" value="Volver" onclick="window.location.href='./inicio_controller.php'" class="btn btn-warning disabled"><BR>
				</div>
				<br>
				<div>
					<?php if (isset($resultado)) { ?>

						<h4>Facturas de <?php echo $Name ?></h3>
							<table>

								<tr>
									<th>Numero Factura</th>
									<th>Fechaa Factura</th>
									<th>Importe total</th>

								</tr>

								<?php foreach ($resultado as $consulta) { ?>
									<tr>
										<?php foreach ($consulta as $key => $value) { ?>

											<td><?php echo $value; ?></td>

									<?php }?>
									</tr>
									<?php } ?>
									

									</tr>
							</table>
						<?php } ?>
				</div>

				<!-- FIN DEL FORMULARIO -->
			</div>



</body>

>>>>>>> 8698404c50d057c578f2f96dc3177ae54fdd1eb2
</html>