<?php
function limpiar_campo($campoformulario)
{
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);

    return $campoformulario;
}

function abrrirconn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pedidos";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}


function login($user, $psswd)
{

    $conn = abrrirconn();

    try {
        //sentencia
        $stmt = $conn->prepare("SELECT customerNumber,customerName,contactLastName FROM customers where customerNumber=:user"); //

        $stmt->bindParam(':user', $user);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        var_dump($resultado);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    //var_dump($resultado);
    if (sizeof($resultado) != 0) {
        $psswdBaseDatos = $resultado[0]['contactLastName'];
        //si la contraseña de mi bdd, es la misma que la del formulaio, entra y guarda la sesion.

        if ($psswdBaseDatos == $psswd) {
            session_start();
            $_SESSION['user'] = $resultado[0]['customerName'];
            $_SESSION['customerNumber'] = $resultado[0]['customerNumber'];
            
            header("Location: ./pe_inicio.php");
        } else {

            echo "Contraseña incorrecta para el usuario $user";
        }
    } else {
        echo "No existe el usuario $user ";
    }

    $conn = null;
}

function fill_pe_inicio()
{

    $conn = abrrirconn();

    try {

        $stmt = $conn->prepare("SELECT productCode,productName,buyPrice FROM products WHERE quantityInStock>0"); //selecciono los datos de la tabla producto
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ConsultaProducto = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    if (sizeof($ConsultaProducto) != 0) {

        foreach ($ConsultaProducto as $row) {
            echo "<option value='$row[productCode]'> $row[productName] || $row[buyPrice] €</option>";
        }
    }

    $conn = null;
}

function SelectDataCookie($Producto)
{

    $conn = abrrirconn();

    try {

        $stmt = $conn->prepare("SELECT productCode,productName,quantityInStock,buyPrice FROM products WHERE productCode=:productCode"); //selecciono los datos de la tabla producto
        $stmt->bindParam(":productCode", $Producto);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ConsultaProducto = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    return $ConsultaProducto;
}

function addProductCookie($producto, $amount)
{

    $datos = SelectDataCookie($producto);

    $key = $producto;

    if (!isset($_COOKIE['carrito'])) {
        //creamos el carrito
        $carrito = array();

        $carrito[$key]['productName'] = $datos[0]['productName'];
        $carrito[$key]['amount'] = $amount;
        $carrito[$key]['buyPrice'] = $datos[0]['buyPrice'];

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    } else {

        $carrito = json_decode($_COOKIE['carrito'], flags: JSON_OBJECT_AS_ARRAY); //con flags, o con true en el segundo parámetro. 

        $carrito[$key]['productName'] = $datos[0]['productName'];
        $carrito[$key]['amount'] = $amount;
        $carrito[$key]['buyPrice'] = $datos[0]['buyPrice'];

        setcookie("carrito", json_encode($carrito), time() + (86400 * 30), "/");
    }

    return $carrito;
}


function selecctOrderLineNumber()
{

    $conn = abrrirconn();

    try {

        $stmt = $conn->prepare("SELECT MAX(orderLineNumber)+1 as max FROM orderdetails"); //selecciono los datos de la tabla producto

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $Consulta = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    return $Consulta[0]['max'];
}


function buy($cart,$conn,$checkNumber,$totalPayment)
{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $orderNumber = selectOrderNumber();
    $orderDate = date("Y-m-d");
    $status = '-';
    $comments = "COMPRAS DE PRUEBA CLASE";
    $customerNumber = $_SESSION['customerNumber'];

    try {

        insertOrders($conn, $orderNumber, $orderDate, $status, $comments, $customerNumber);
        insertOrderDetails($conn, $cart, $orderNumber,$totalPayment);
        insertPayment($conn, $customerNumber, $totalPayment, $orderDate,$checkNumber);

        
        
    } catch (Exception $e) {

        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}
////INSERTS////
function insertOrders($conn, $orderNumber, $orderDate, $status, $comments, $customerNumber){

    $stmt = $conn->prepare("INSERT into orders (orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber) values (:orderNumber, :orderDate,:requiredDate,:shippedDate,:status,:comments,:customerNumber)");

    $stmt->bindParam(":orderNumber", $orderNumber);
    $stmt->bindParam(":orderDate", $orderDate);
    $stmt->bindParam(":requiredDate", $orderDate);
    $stmt->bindParam(":shippedDate", $orderDate);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":comments", $comments);
    $stmt->bindParam(":customerNumber", $customerNumber);

    $stmt->execute();
}
function insertOrderDetails($conn, $cart, $orderNumber){

    foreach ($cart as $ProductID => $ProductDetails) {

        $quantityOrdered = $ProductDetails['amount'];
        $priceEach = $ProductDetails['buyPrice'];
        $orderLineNumber = selecctOrderLineNumber();

        $stmt1 = $conn->prepare("INSERT INTO orderdetails (orderNumber, productCode, quantityOrdered, priceEach, orderLineNumber) VALUES (:orderNumber, :productCode, :quantityOrdered, :priceEach, :orderLineNumber)");

        // Asignar valores a los nuevos parámetros
        $stmt1->bindParam(":orderNumber", $orderNumber);
        $stmt1->bindParam(":productCode", $ProductID);
        $stmt1->bindParam(":quantityOrdered", $quantityOrdered);
        $stmt1->bindParam(":priceEach", $priceEach);
        $stmt1->bindParam(":orderLineNumber", $orderLineNumber);

        $stmt1->execute();

        updateProducts($conn, $ProductID, $quantityOrdered);
    }
   
}
function insertPayment($conn, $customerNumber, $totalPayment, $orderDate){

    $checkNumber = selectMaxCheckNumber();

    $stmt1 = $conn->prepare("INSERT INTO payments (customerNumber,checkNumber,paymentDate,amount) values (:customerNumber,:checkNumber,:paymentDate,:amount)");

    // Asignar valores a los nuevos parámetros

    $stmt1->bindParam(":checkNumber", $checkNumber);
    $stmt1->bindParam(":customerNumber", $customerNumber);
    $stmt1->bindParam(":amount", $totalPayment);
    $stmt1->bindParam(":paymentDate", $orderDate);
    $stmt1->execute();
    return $checkNumber;
}
////UPDATES////
function updateProducts($conn, $ProductID, $quantityOrdered){

    $stmt1 = $conn->prepare("UPDATE products SET quantityInStock = quantityInStock-:quantityOrdered WHERE productCode = :productCode");

    // Asignar valores a los nuevos parámetros

    $stmt1->bindParam(":productCode", $ProductID);
    $stmt1->bindParam(":quantityOrdered", $quantityOrdered);
    $stmt1->execute();
}
////SELECTS////
function selectOrderNumber(){

    $conn = abrrirconn();

    try {

        $stmt = $conn->prepare("SELECT MAX(orderNumber)+1 as max FROM orders"); //selecciono los datos de la tabla producto

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $Consulta = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    return $Consulta[0]['max'];
}
function selectMaxCheckNumber(){

    return rand(10000000, 99999999);
}
function selectAmount(){

    $checkNumber = $_SESSION["checkNumber"];
    $conn = abrrirconn();

    try {

        $stmt = $conn->prepare("SELECT amount from payments where checkNumber=:checkNumber"); //selecciono los datos de la tabla producto
        $stmt->bindParam(":checkNumber", $checkNumber);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $Consulta = $stmt->fetchAll();
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    return $Consulta[0]['amount'];
}

function calcularTotalCompra($carrito)
{

    foreach ($carrito as $ProductID => $ProductDetails) {

        $totalPayment = + ($ProductDetails['buyPrice'] * $ProductDetails['amount']);
    }
    return $totalPayment;
}