<?php
function limpiar_campo($campoformulario)
{
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);

    return $campoformulario;
}
function addVueloCookie($vuelo,$asientos,$fecha)
{

    
    $vuelo=explode(',',$vuelo);

    $id_vuelo=$vuelo[0];
    $precio=$vuelo[1];
    
    

    if (!isset($_COOKIE['carrito'])) {
        //CREAMOS EL CARRITO SI NO ESTA CREADO

        $carrito = array();

        $precioTotal=$precio*$asientos;
        $carrito[$id_vuelo]['id'] = $id_vuelo;
        $carrito[$id_vuelo]['asientos'] = $asientos;
        $carrito[$id_vuelo]['precio'] = $precioTotal;
        $carrito[$id_vuelo]['fecha'] = $fecha;
        
        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {

        $carrito = json_decode($_COOKIE['carrito'],JSON_OBJECT_AS_ARRAY); //con flags, o con true en el segundo parámetro. 

        if (isset($carrito[$id_vuelo])) {

            $carrito[$id_vuelo]['id'] = $id_vuelo;
            $carrito[$id_vuelo]['asientos'] += $asientos;
            $carrito[$id_vuelo]['precio'] = $carrito[$id_vuelo]['asientos']*$precio;
            $carrito[$id_vuelo]['fecha'] = $fecha;

        }else{

            $precioTotal=$precio*$asientos;
            
            $carrito[$id_vuelo]['id'] = $id_vuelo;
            $carrito[$id_vuelo]['asientos'] = $asientos;
            $carrito[$id_vuelo]['precio'] = $precioTotal;
            $carrito[$id_vuelo]['fecha'] = $fecha;
        }

        

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    }

   
    return $carrito;
}

function removeProductCookie()
{
    
    setcookie("carrito", '', time() - (3600), "/");
    header("Refresh:0");
}

function idreserva(){

    $id_reserva = explode('R',select_MAX_reserva() );

    $id_reserva = intval($id_reserva[1]) + 1;

    $id_reserva='R'.str_pad($id_reserva,4,"0",STR_PAD_LEFT);
    return $id_reserva;
}

function preciototal(){
    //si es el primer vuelo, el carrito con la cookie no ha llegado. Entonces trabajamos con el carrito local. 
   //trabajamos con la cookie local ya que siempre recogemos uno antiguo. 
    global $carrito;
   
    
    $precioTotal=0;

    foreach ($carrito as $value) {

        $precioTotal += $value['precio'];
    }
    return $precioTotal;
}
//preciototalsincarrito

function paramspago($miObj){

    global $id_reserva;
    global $precioTotal;

    $fuc = "999008881";
    $terminal = "1";
    $moneda = "978";
    $trans = "0";
    $url = "";
    $urlOK = "http://localhost/Examen2EV-CarlosMaqueda/controllers/vreservas_controller.php";
    $urlKO = "http://localhost/Examen2EV-CarlosMaqueda/controllers/vreservas_controller.php";
    
    //echo "va a realizar un pago con identificador: $id";
    // Se Rellenan los campos
    $miObj->setParameter("DS_MERCHANT_AMOUNT", $precioTotal);
    $miObj->setParameter("DS_MERCHANT_ORDER", $id_reserva);
    $miObj->setParameter("DS_MERCHANT_MERCHANTCODE", $fuc);
    $miObj->setParameter("DS_MERCHANT_CURRENCY", $moneda);
    $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $trans);
    $miObj->setParameter("DS_MERCHANT_TERMINAL", $terminal);
    $miObj->setParameter("DS_MERCHANT_MERCHANTURL", $url);
    $miObj->setParameter("DS_MERCHANT_URLOK", $urlOK);
    $miObj->setParameter("DS_MERCHANT_URLKO", $urlKO);
}

function decodeRedsys($miObj,$params){
    
    $miObj->decodeMerchantParameters($params);
    return $miObj->getParameter("Ds_Response");

}
function codigoCompra($miObj,$params){
  
    $miObj->decodeMerchantParameters($params);
   
    return $miObj->getParameter("Ds_Order");

}
function totalCompra($miObj,$params){

    $miObj->decodeMerchantParameters($params);
    
    return $miObj->getParameter("Ds_Amount");
}
