<?php
session_start();
////////////IMPORTAMOS MODEL
require_once("../db/movdb.php");
require_once("../models/movalquilar_model.php");
require_once("./functions/movalquilar_functions.php");
$coches = select_coches();
var_dump($_POST);

if (isset($_POST["agregar"])) {

    date_default_timezone_set("Europe/Madrid");

    $vehiculo = limpiar_campo($_POST['vehiculos']);
    $fecha = date("y-m-d H:i:s");

    addProductCookie($vehiculo, $fecha);
}

require_once("../views/movalquilar.php");
