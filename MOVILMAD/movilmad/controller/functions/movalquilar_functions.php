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

    

    if (!isset($_COOKIE['carrito'])) {
        //CREAMOS EL CARRITO SI NO ESTA CREADO

        $carrito = array();

        
        $carrito[$matricula]['precio'] = $precio;
        $carrito[$matricula]['fecha'] = $fecha;
        
        
        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {
        //con flags, o con true en el segundo parámetro. 
        $carrito = json_decode($_COOKIE['carrito'], flags: JSON_OBJECT_AS_ARRAY);

        if (sizeof($carrito)<=2) {

            if (isset($carrito[$matricula])) {

                require_once("../views/error_views/movcarrito_error.php");
    
            }else{
    
                $carrito[$matricula]['precio'] = $precio;
                $carrito[$matricula]['fecha'] = $fecha;
            }
    
            setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
        }else{

            require_once("../views/error_views/movcarrito_overflow.php");
        }

       
    }

    return $carrito;
    
}

function removeProductCookie($vehiculo)
{
    $vehiculo = explode(',', $vehiculo);

    $matricula = $vehiculo[0];

    if (!isset($_COOKIE['carrito'])) {
        require_once("../views/error_views/movcarrito_empty.php");
    } else {

        $carrito = json_decode($_COOKIE['carrito'], flags: JSON_OBJECT_AS_ARRAY); //con flags, o con true en el segundo parámetro. y

        if (!isset($carrito[$matricula])) {

            require_once("../views/error_views/movcarrito_empty.php");
        } else {

            unset($carrito[$matricula]);
            setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");

            if (count($carrito) == 0) {

                setcookie("carrito", json_encode($carrito), time() - (3600), "/");
                header("Refresh:0");
            }
        }

        return $carrito;
    }

    
}

    
