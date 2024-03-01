<?php
session_start();
require_once("./functions/vreservasfunctions.php");

////////////MODEL RESERVAS/////////////////////

require_once("../db/vconfig.php");
require_once("../models/vreservas_model.php");

$vuelosdb = select_vuelos();
///inicio las variables para el pago a null.//////////////////

$version = null;
$params = null;
$signature = null;

///////////////////////////////////LOGICA DE NEGOCIO////////////////////////////

global $carrito;


if (isset($_POST["agregar"])) {

    //////////AGREGAR VUELO CESTA

    date_default_timezone_set("Europe/Madrid");

    $vuelos = limpiar_campo($_POST['vuelos']);
    $asientos = limpiar_campo($_POST['asientos']);
    $fecha = date("y-m-d H:i:s");

    $carrito = addVueloCookie($vuelos, $asientos, $fecha);

    ////////////////PARAMETROS REDSYS////////////////////

    $id_reserva = time();
    $precioTotal = preciototal() . '00';

    require_once('./redsys/apiRedsys.php');
    $objRedsys = new RedsysAPI;

    paramsPago($objRedsys);

    //Datos de configuración
    $version = "HMAC_SHA256_V1";
    $kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //Clave recuperada de CANALES
    // Se generan los parámetros de la petición
    $request = "";
    $params = $objRedsys->createMerchantParameters();
    $signature = $objRedsys->createMerchantSignature($kc);


    ///////////////////////////////////


}

if (isset($_POST["vaciar"])) {

    ///////VACIAR CESTA

    if (isset($_COOKIE["carrito"])) {

        removeProductCookie();
    } else {

        require_once("../views/vreservas_error.php");
    }
}

if (isset($_POST["volver"])) {

    ///////VOLVER

    header('Location: ./vinicio_controller.php');
}

if (!empty($_GET)) {
   
    require_once("./redsys/apiRedsys.php");

    $params = $_GET["Ds_MerchantParameters"];
    $objRedsys = new RedsysAPI;
    $Respuesta = decodeRedsys($objRedsys, $params);
    $CodCompra = idreserva();
    $total = substr(totalCompra($objRedsys, $params), 0, -2);

    $carrito = json_decode($_COOKIE['carrito'], true);

    //////////llamada a funcion controller ////////////



    global $conexion;
    $conexion->beginTransaction();


    foreach ($carrito as $idVuelo => $details) {

        insertupdate_reserva($conexion, $CodCompra, $idVuelo, $_SESSION['dni'], $details['fecha'], $details['asientos'], $details['precio']);
       
    }
    

    if (intval($Respuesta)>=0 && intval($Respuesta)<=99) {
    
        $conexion->commit();
        echo "compra realizada correctamente $Respuesta";
        setcookie("carrito", '', time() - (86400 * 30), "/");

        header("Location: ./vreservas_controller");
    }
    else{

        $conexion->rollBack();
        echo "error en la compra $Respuesta </br>";

        echo "Se ha conservado el carrito";
        
    }
    
}
///////////////////////VISTA RESERVAS/////////////////////////////////

require_once("../views/vreservas.php");
