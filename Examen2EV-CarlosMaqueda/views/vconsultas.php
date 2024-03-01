<?php


$user = $_SESSION['user'];
$email = $_SESSION['email'];
$fecha = $_SESSION['fecha'];


?>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RESERVAS VUELOS</title>
	<style>
          table,td,th {
           margin: 0.5em;
            border: 2px solid green;
            width: 1em;
        }
    </style>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Consultar Reservas</div>
			<div class="card-body">


				<!-- INICIO DEL FORMULARIO -->
				<form action="./vconsultas_controller.php" method="post">

					<B>Email Cliente: </B> <?php echo $email ?> <BR>
					<B>Nombre Cliente:</B> <?php echo $user ?> <BR>
					<B>Fecha:</B> <?php echo $fecha ?> <BR><BR>

					<B>Numero Reserva</B>
					<select name="reserva" class="form-control">
						<?php
						foreach ($reservas as $reserva) {

							echo "<option value=$reserva[id_reserva]> $reserva[id_reserva]</option>";
						}
						?>
					</select>
					<BR><BR>
					<div>
						<table>
							
						<tr>
								<th>RESERVA</th>
								<th>VUELO</th>
								<th>DNI</th>
								<th>FECHA</th>
								<th>ASIENTOS</th>
								<th>PRECIO TOTAL</th>
								
							</tr>
							
							<?php if (isset($_POST["consultar"])) {
									foreach ($consultas as $consulta) { ?>
									<tr>
										<?php foreach ($consulta as $key => $value){?>

										<td><?php echo $value; ?></td>

									<?php } }?>
										</tr>
								<?php }?>
							</tr>
						</table>
					</div>
					<br><br>
					<div>
						<input type="submit" value="Consultar Reserva" name="consultar" class="btn btn-warning disabled">
						<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
					</div>
				</form>

				<!-- FIN DEL FORMULARIO -->
				<a href="./vlogout_controller.php">Cerrar Sesion</a>
</body>

</html>