<?php

session_start();
include './functions.php'; 
$user = $_SESSION['user'];
//boton añadir a la cesta
if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['boton'] == "Añadir a la cesta")) {

    $producto = limpiar_campo($_POST["productos"]);

    if (!isset($_COOKIE['carrito'])) {
        //creamos el carrito
        $carrito = array();
        $carrito[] = $producto;
        

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {

        $carrito = json_decode($_COOKIE['carrito']);

        $carrito[] = $producto;
        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    }
}
//boton añadir a la comprar
if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['boton'] == "COMPRAR")) {
    echo "comprar";
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="productos" id="productos">
            <?php
            fill_pe_inicio();
            ?>
        </select>
        <select name="cantidad" id="cantidad">
            <?php
            mostrar_stock();
            ?>
        </select>
        <input type="submit" name="boton" value="Añadir a la cesta">
        <input type="submit" name="boton" value="COMPRAR">
    </form>

</body>