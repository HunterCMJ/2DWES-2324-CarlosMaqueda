<?php
	$Name=$_SESSION['Name'];
	$Address=$_SESSION['Address'];
   	$City=$_SESSION['City'];
   $Country=$_SESSION['Country'];

?>

<html>
   
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPOTIFY - IES Leonardo Da Vinci</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
   
    <body>
   

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - SPOTIFY IES Leonardo Da Vinci</div>
		<div class="card-body">
	
	<B>Nombre Cliente:</B> <?php echo $Name ?>  <BR>
	<B>Dirección:</B> <?php echo $Address ?> <BR>
	<B>Ciudad </B> <?php echo $City ?> <BR>
	<B>País:</B> <?php echo $Country ?><BR><BR>
			
		<!--Formulario con botones -->
		<input type="button" value="Descargar Canciones" onclick="window.location.href='./descargas_controller.php'" class="btn btn-warning disabled">
				
		<input type="button" value="Consultar Factura" onclick="window.location.href='./facturas_controller.php'" class="btn btn-warning disabled">
		
		<input type="button" value="Volver" onclick="window.location.href='../index.php'" class="btn btn-warning disabled"><BR>
		
		  <BR><a href="./logout_controller.php">Cerrar Sesión</a>
	</div>  
	  
	  
     
   </body>
   
</html>