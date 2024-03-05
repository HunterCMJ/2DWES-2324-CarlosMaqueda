<?php

function select_facturas($Desde,$Hasta){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare(" SELECT InvoiceId,InvoiceDate,Total from invoice where date(InvoiceDate) BETWEEN :Desde AND :Hasta AND CustomerID=:CustomerID "); 
        $stmt->bindParam(":Desde",$Desde);
        $stmt->bindParam(":Hasta",$Hasta);
        $stmt->bindParam(":CustomerID",$_SESSION['Id']);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    return $resultado;

}

?>