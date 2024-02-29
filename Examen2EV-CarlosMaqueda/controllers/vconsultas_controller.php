<?php


session_start();
require_once("./functions/vreservasfunctions.php");

////////////MODEL RESERVAS/////////////////////

require_once("../db/vconfig.php");
require_once("../models/vconsultas_model.php");

$reservas=select_reserva();

///////////////////LOGICA DE NEGOCIO/////////////

if (isset($_POST["consultar"])) {

    $reserva=$_POST['reserva'];

   
    $consultas=select_datosreserva($reserva);

    
}
if (isset($_POST["volver"])) {

    ///////VOLVER

    header('Location: ./vinicio_controller.php');
}
//////////////views//////////////

require_once("../views/vconsultas.php")
?>