<?php
function select_reserva(){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT distinct id_reserva as id_reserva FROM reservas"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    return $resultado;
}
function select_datosreserva($reserva){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT * FROM reservas where id_reserva='$reserva'"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    return $resultado;
}