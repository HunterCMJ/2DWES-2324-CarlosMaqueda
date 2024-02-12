<?php

session_start();

if (!$_SESSION['user']) {
    
    header("Location: ./pe_login.php");
}
include './functions.php';
include './redsys/apiRedsys.php';
$user = $_SESSION['user'];

////////BOTON AÑADIR A LA CESTA
if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['boton'] == "Añadir a la cesta")) {

    $producto = limpiar_campo($_POST["productos"]);
    $amount = limpiar_campo($_POST["amount"]);

    if (!$amount) {

        echo "Introduzca una cantidad";

    } else {

        $carrito=addProductCookie($producto, $amount);
        var_dump($carrito);
    }
}
////////BOTON QUITAR DE LA CESTA
if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['boton'] == "Quitar de la cesta")) {

    $producto = limpiar_campo($_POST["productos"]);
    $amount = limpiar_campo($_POST["amount"]);

    if (!$amount) {

        echo "Introduzca una cantidad";

    } else {
        
        $carrito=removeProductCookie($producto, $amount);
    }
}
///////////////BOTON COMPRAR
if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['boton'] == "COMPRAR")) {

    if (isset($_COOKIE['carrito'])) {

        $carrito = json_decode($_COOKIE['carrito'], true);

        $checkNumber = rand(10000000,
            99999999
        );
        $totalPayment = intval(str_replace('.', '', strval(calcularTotalCompra($carrito))));

        $_SESSION['checkNumber'] = $checkNumber;
        $_SESSION['totalPayment'] = $totalPayment;

        var_dump($totalPayment);

        header("Location: ./pe_pago.php");
    } else {

        echo "Nada en la cesta";
    }
}

//////////////BOTON MOSTRAR CESTA

if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['boton'] == "Mostrar Cesta")) {
    
    if (isset($_COOKIE['carrito'])) {

        $carrito=json_decode($_COOKIE['carrito'],true);
        var_dump($carrito);

    } else {

        echo "Nada en la cesta";
    }
}
if (!empty($_GET)) {

    $miObj = new RedsysAPI;

    $version = $_GET["Ds_SignatureVersion"];
    $params = $_GET["Ds_MerchantParameters"];
    $signatureRecibida = $_GET["Ds_Signature"];

    $decodec = $miObj->decodeMerchantParameters($params);

    $codigoRespuesta = $miObj->getParameter("Ds_Response"); 

    $carrito=json_decode($_COOKIE['carrito'],true);

    $checkNumber=$_SESSION['checkNumber'];
    $totalPayment=$_SESSION['totalPayment'];

    $conn = abrrirconn();
    $conn->beginTransaction();
   
    buy($carrito, $conn, $checkNumber,$totalPayment);
    
    if (intval($codigoRespuesta)>=0 && intval($codigoRespuesta)<=99) {

        $conn->commit();
        echo "compra realizada correctamente $codigoRespuesta";
        setcookie("carrito", json_encode($carrito), time() - (86400 * 30), "/");
    }
    else{

        $conn->rollBack();
        echo "error en la compra $codigoRespuesta </br>";

        echo "Se ha conservado el carrito";
        
    }

}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title> $user</title><H1> ¿Qué desdea Comprar $user ?</H1>"; ?>
</head>

<body>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="productos" id="productos">
            <?php
            fill_pe_inicio();
            ?>
        </select>
        <input type="text" name="amount" placeholder="cantidad">
        <br><br>
        <input type="submit" name="boton" value="Añadir a la cesta">
        <input type="submit" name="boton" value="Quitar de la cesta">
        <input type="submit" name="boton" value="Mostrar Cesta">
        <input type="submit" name="boton" value="COMPRAR">

    </form>
    <a href="./pe_inicio.php"><button>volver</button></a>
</body>