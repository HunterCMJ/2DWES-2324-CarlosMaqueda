<?php


session_start();
//require_once("./functions/vreservasfunctions.php");

////////////MODEL RESERVAS/////////////////////
require_once("./functions/facturasfunctions.php");
require_once("../db/config.php");
require_once("../models/facturas_model.php");



///////////////////LOGICA DE NEGOCIO/////////////

if (isset($_POST["Consultar"])) {

    $desde = limpiar_campo($_POST["Desde"]);
    $hasta = limpiar_campo($_POST["Hasta"]);

    

    $resultado=select_facturas($desde,$hasta);


    
}
if (isset($_POST["volver"])) {

    ///////VOLVER

    header('Location: ./inicio_controller.php');
}
//////////////views//////////////

require_once("../views/facturas.php")
?>
