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
	<style>
          table,td,th {
           margin: 1em;
            border: 2px solid green;
            width: 3em;
        }
    </style>
	<title>RESERVAS VUELOS</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">

			<div class="card-header">Reservar Vuelos</div>

			<div class="card-body">


				<!-- INICIO DEL FORMULARIO -->
				<form action="vreservas_controller.php" method="post">

					<B>Email Cliente: </B> <?php echo $email ?> <BR>
					<B>Nombre Cliente:</B> <?php echo $user ?> <BR>
					<B>Fecha:</B> <?php echo $fecha ?> <BR><BR>

					<B>Vuelos</B><select name="vuelos" class="form-control">
						<?php
						foreach ($vuelosdb as $vuelodb) {

							echo "<option value=$vuelodb[id_vuelo],$vuelodb[precio_asiento]>Vuelo $vuelodb[id_vuelo] || $vuelodb[destino] - $vuelodb[origen] || Precio Asiento: $vuelodb[precio_asiento]€</option>";
						}
						?>
					</select>
					<BR>
					<B>Número Asientos</B><input type="number" name="asientos" size="3" min="1" max="100" value="1" class="form-control">
					<BR><BR>
					<div>
					<?php if ($carrito){?>
						<table>
						<tr>
								<th>Vuelo</th>
								<th>ID</th>
								<th>asientos</th>
								<th>Precio</th>
								<th>Fecha</th>

							</tr>
							<?php foreach ($carrito as $idvuelo => $datos) { ?>
								<tr>
									<td>
										<?php echo $idvuelo; ?>
									</td>

									<?php foreach ($datos as $detalle) { ?>
										<td>
											<?php echo $detalle; ?>
										</td>

									<?php } ?>
								</tr>
							<?php } }?>
						</table>
					</div>
					<div>
						<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">

						<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
						<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
					</div>
				</form>
				<form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
					<input type="hidden" name="Ds_SignatureVersion" value="<?php echo $version; ?>" />
					<input type="hidden" name="Ds_MerchantParameters" value="<?php echo $params; ?>" />
					<input type="hidden" name="Ds_Signature" value="<?php echo $signature; ?>" /><br>
					<p>No pulsar si no hay nada en la cesta</p>
					<input type="submit" value="Comprar" name="comprar" class="btn btn-warning disabled">
				</form>
				<!-- FIN DEL FORMULARIO -->
				<a href="./vlogout_controller.php">Cerrar Sesion</a>
			</div>
		</div>
	</div>
</body>

</html>