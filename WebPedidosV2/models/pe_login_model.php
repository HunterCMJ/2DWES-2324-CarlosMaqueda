<?php

$conn = abrrirconn();
try {
    //sentencia
    $stmt = $conn->prepare("SELECT customerNumber,customerName,contactLastName FROM customers where customerNumber=:user"); //

    $stmt->bindParam(':user', $user);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
