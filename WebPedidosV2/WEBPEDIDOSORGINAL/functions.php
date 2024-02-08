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
    $password = "rootroot";
    $dbname = "pedidos";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}




function login($user, $psswd)
{

    //var_dump($resultado);
    if (sizeof($resultado) != 0) {
        $psswdBaseDatos = $resultado[0]['contactLastName'];
        //si la contraseña de mi bdd, es la misma que la del formulaio, entra y guarda la sesion.

        if ($psswdBaseDatos == $psswd) {
            session_start();
            $_SESSION['user'] = $resultado[0]['customerName'];
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

        $stmt = $conn->prepare("SELECT productCode,productName,quantityInStock,buyPrice FROM products WHERE quantityInStock>0"); //selecciono los datos de la tabla producto
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ConsultaProducto = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    if (sizeof($ConsultaProducto) != 0) {

        foreach ($ConsultaProducto as $row) {
            echo "<option value='$row[productCode] $row[productName] $row[quantityInStock] $row[buyPrice]'> $row[productName] || $row[buyPrice] €</option>";
        }
    }


    $conn = null;
}


?>