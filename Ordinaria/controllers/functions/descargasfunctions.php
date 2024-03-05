<<<<<<< HEAD
<?php

function addCancionCookie($cancion,$cantidad)
{

    
    $cantidadeid=explode(',',$cancion);

    $cancion=$cantidadeid[0];

    $precio=$cantidadeid[1];

   
    
    $precioTotal=$precio*$cantidad;


    if (!isset($_COOKIE['carrito'])) {
        //CREAMOS EL CARRITO SI NO ESTA CREADO

        $carrito = array();

        
        $carrito[$cancion]['id'] = $cancion;
        $carrito[$cancion]['cantidad'] = $cantidad;
        $carrito[$cancion]['precio'] = $precioTotal;
        
        
        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {

        $carrito = json_decode($_COOKIE['carrito'],true); 

        if (isset($carrito[$cancion])) {

            $carrito[$cancion]['id'] = $cancion;
            $carrito[$cancion]['cantidad'] += $cantidad;
            $carrito[$cancion]['precio'] =  $carrito[$cancion]['cantidad'] + $precioTotal;

        }else {
            # code...
           
            $carrito[$cancion]['id'] = $cancion;
            $carrito[$cancion]['cantidad'] = $cantidad;
            $carrito[$cancion]['precio'] = $precioTotal;
          
        }

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    }
   
    return $carrito;
}

function borrarcookiecarrito(){
    setcookie("carrito",'', time() - (86400 * 30), "/");
}

=======
<?php

function addCancionCookie($cancion,$cantidad)
{

    
    $cantidadeid=explode(',',$cancion);

    $cancion=$cantidadeid[0];

    $precio=$cantidadeid[1];

   
    
    $precioTotal=$precio*$cantidad;


    if (!isset($_COOKIE['carrito'])) {
        //CREAMOS EL CARRITO SI NO ESTA CREADO

        $carrito = array();

        
        $carrito[$cancion]['id'] = $cancion;
        $carrito[$cancion]['cantidad'] = $cantidad;
        $carrito[$cancion]['precio'] = $precioTotal;
        
        
        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {

        $carrito = json_decode($_COOKIE['carrito'],true); 

        if (isset($carrito[$cancion])) {

            $carrito[$cancion]['id'] = $cancion;
            $carrito[$cancion]['cantidad'] += $cantidad;
            $carrito[$cancion]['precio'] =  $carrito[$cancion]['cantidad'] + $precioTotal;

        }else {
            # code...
           
            $carrito[$cancion]['id'] = $cancion;
            $carrito[$cancion]['cantidad'] = $cantidad;
            $carrito[$cancion]['precio'] = $precioTotal;
          
        }

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    }
   
    return $carrito;
}

function borrarcookiecarrito(){
    setcookie("carrito",'', time() - (86400 * 30), "/");
}

>>>>>>> 8698404c50d057c578f2f96dc3177ae54fdd1eb2
?>