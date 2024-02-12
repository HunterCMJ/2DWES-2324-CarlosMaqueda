<?php

    session_start();

    if (!$_SESSION['user']) {
        header("Location: ./pe_login.php");
    }
    // Se incluye la librería
    include './redsys/apiRedsys.php';
    include './functions.php';

    // Se crea Objeto
    $miObj = new RedsysAPI;

    // Valores de entrada que no hemos cmbiado para ningun ejemplo
    $fuc = "999008881";
    $terminal = "1";
    $moneda = "978";
    $trans = "0";
    $url = "";
    $urlOK = "http://localhost/webpedidos/pe_altaped.php";
    $urlKO = "http://localhost/webpedidos/pe_altaped.php";

    $id = $_SESSION["checkNumber"];
    $amount = $_SESSION["totalPayment"];
    echo "va a realizar un pago con identificador: $id";
    // Se Rellenan los campos
    $miObj->setParameter("DS_MERCHANT_AMOUNT", $amount);
    $miObj->setParameter("DS_MERCHANT_ORDER", $id);
    $miObj->setParameter("DS_MERCHANT_MERCHANTCODE", $fuc);
    $miObj->setParameter("DS_MERCHANT_CURRENCY", $moneda);
    $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $trans);
    $miObj->setParameter("DS_MERCHANT_TERMINAL", $terminal);
    $miObj->setParameter("DS_MERCHANT_MERCHANTURL", $url);
    $miObj->setParameter("DS_MERCHANT_URLOK", $urlOK);
    $miObj->setParameter("DS_MERCHANT_URLKO", $urlKO);

    //Datos de configuración
    $version = "HMAC_SHA256_V1";
    $kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //Clave recuperada de CANALES
    // Se generan los parámetros de la petición
    $request = "";
    $params = $miObj->createMerchantParameters();
    $signature = $miObj->createMerchantSignature($kc);


?>

<html lang="es">

<head>
</head>

<body>
    <form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
         <input type="hidden" name="Ds_SignatureVersion" value="<?php echo $version; ?>" />
         <input type="hidden" name="Ds_MerchantParameters" value="<?php echo $params; ?>" />
         <input type="hidden" name="Ds_Signature" value="<?php echo $signature; ?>" /><br>
        <input type="submit" value="PAGAR">
    </form>
    
    <a href="./pe_altaped.php"><button>Volver A Pedidos</button></a>
</body>

</html>