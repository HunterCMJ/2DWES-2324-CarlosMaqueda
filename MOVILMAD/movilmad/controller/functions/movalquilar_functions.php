<?php

///////////////////////////////////////

function limpiar_campo($campoformulario)
{
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);

    return $campoformulario;
}

////////////////////////////////////////

function addProductCookie($vehiculo,$fecha)
{

    $vehiculo=explode(',',$vehiculo);

    $matricula=$vehiculo[0];
    $precio=$vehiculo[1];

    var_dump($matricula,$precio);

    if (!isset($_COOKIE['carrito'])) {
        //CREAMOS EL CARRITO SI NO ESTA CREADO

        $carrito = array();

        //$carrito
        $carrito[$matricula]['precio'] = $precio;
        $carrito[$matricula]['fecha'] = $fecha;
        
        var_dump($carrito);
        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {

        $carrito = json_decode($_COOKIE['carrito'], flags: JSON_OBJECT_AS_ARRAY); //con flags, o con true en el segundo parámetro. 

        if (isset($carrito[$matricula])) {

            require_once("../views/error_views/movcarrito_error.php");

        }else{

            $carrito[$matricula]['precio'] = $precio;
            $carrito[$matricula]['fecha'] = $fecha;
        }

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    }

    return $carrito;
    
}
