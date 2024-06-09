<?php
session_start();

require_once("./functions/descargasfunctions.php");
require_once("../db/config.php");
require_once("../models/descargas_model.php");

$resultado = select_canciones();
$carrito=null;


if (isset($_POST["agregar"])) {

    $idCancion = $_POST['cancion'];
    $cantidad = $_POST['cantidad'];


    $carrito = addCancionCookie($idCancion, $cantidad);
    header('Refresh:0');
}

if (isset($_POST['descargar'])) {

    if (isset($_COOKIE['carrito'])) {

        $carrito = json_decode($_COOKIE['carrito'], true);

        insertUpdate($carrito);
        borrarcookiecarrito($carrito);  
        $valor=true;
        
        while ($valor) {

            header('refresh:0');
            $valor=false;
        }
       
       
    }
}


if (isset($_POST['volver'])) {

    header('location:./inicio_controller ');
}

if (isset($_POST['vaciar'])) {

    if (isset($_COOKIE['carrito'])) {

        $carrito = json_decode($_COOKIE['carrito'], true);
        borrarcookiecarrito($carrito);
        $valor=true;
        while ($valor) {

            header('refresh:0');
            $valor=false;
        }
    }
}


//////VISTA
require_once("../views/descargas.php");

if (isset($_COOKIE['carrito'])) {

    $carrito = json_decode($_COOKIE['carrito'], true);
   // header('refresh: 0');
    require_once('../views/mostrarCarrito.php');
}
