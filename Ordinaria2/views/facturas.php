<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SPOTIFY - IES Leonardo Da Vinci </title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
	<div class="container ">
		<!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Consultar Factura - SPOTIFY IES Leonardo Da Vinci</div>
			<div class="card-body">
				<B>Nombre Cliente:</B>  <BR>
				<B>Dirección:</B>  <BR>
				<B>Ciudad </B>  <BR>
				<B>País:</B><BR>
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
					<h4>Facturas de </h3>
					<table>
						<tr>
							<th>Numero Factura</th>
							<th>Fechaa Factura</th>
							<th>Importe total</th>
						</tr>
					</table>
				</div>
				<!-- FIN DEL FORMULARIO -->
			</div>
		</div>
	</div>
</body>

</html>
