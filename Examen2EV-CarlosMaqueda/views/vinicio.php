<?php

	$user=$_SESSION['user'];
	$email=$_SESSION['email'];
	$fecha=$_SESSION['fecha'];

?>

<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>RESERVAS VUELOS</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>
   
 <body>
   
    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario </div>
		<div class="card-body">

		<B>Email Cliente: </B> <?php echo $email?>    <BR>
		<B>Nombre Cliente:</B> <?php echo $user?>    <BR>
		<B>Fecha:</B> <?php echo $fecha?>    <BR><BR>
	  
		<!--Formulario con enlaces -->
		<div>
			<input type="submit" value="Reservar Vuelos" onclick="window.location.href='./vreservas_controller.php'"name="reservar" class="btn btn-warning disabled">
			<input type="submit" value="Consultar Reserva" onclick="window.location.href='./vconsultas_controller.php'"name="consultar" class="btn btn-warning disabled">
			<input type="submit" value="Salir" name="salir" onclick="window.location.href='./vlogout_controller.php'" class="btn btn-warning disabled">
		</div>	
		
       
		
		  
	</div>  
	  
	  
     
   </body>
   
</html>


