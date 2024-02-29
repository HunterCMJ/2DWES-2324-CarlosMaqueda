<?php
session_start();
////////////IMPORTAMOS MODEL
require_once("../db/movdb.php");
require_once("../models/movalquilar_model.php");
require_once("./functions/movalquilar_functions.php");
$coches = select_coches();


if (isset($_POST["agregar"])) {

    
    date_default_timezone_set("Europe/Madrid");

    $vehiculo = limpiar_campo($_POST['vehiculos']);
    $fecha = date("y-m-d H:i:s");

    $carrito=addProductCookie($vehiculo, $fecha);
    
   
    require_once("../views/mostrar_cesta.php");
}

if ( isset($_POST["alquilar"]) ) {

    if (!isset($carrito)) {
        require_once("../views/error_views/movcarrito_empty.php");
    }else{

        
    }
}

if ( isset($_POST["vaciar"]) ) {

    $vehiculo = limpiar_campo($_POST['vehiculos']);
    $carrito=removeProductCookie($vehiculo);

    if (!isset($carrito)) {
        require_once("../views/error_views/movcarrito_empty.php");
    }else{

        require_once("../views/mostrar_cesta.php");
    }
    
}
require_once("../views/movalquilar.php");
