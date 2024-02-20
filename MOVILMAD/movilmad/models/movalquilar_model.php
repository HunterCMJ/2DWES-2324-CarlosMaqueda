<?php
function select_coches(){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT matricula, marca, modelo, preciobase FROM rvehiculos"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    return $resultado;
}




