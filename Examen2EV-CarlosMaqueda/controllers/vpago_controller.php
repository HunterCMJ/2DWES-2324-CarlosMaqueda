<?php

    session_start();

    // Se incluye la librería
   
    require_once("../views/form_redsys_inv_view.php");

    if (!empty($_GET)) {

        $miObj = new RedsysAPI;
    
        
        $params = $_GET["Ds_MerchantParameters"];
      
    
        $decodec = $miObj->decodeMerchantParameters($params);
    
        $codigoRespuesta = $miObj->getParameter("Ds_Response"); 
    
        $carrito=json_decode($_COOKIE['carrito'],true);
    
        global $conexion;

        $conexion->beginTransaction();
       
        require_once("./models/vpago_model.php");

      
      
        

    }
?>
