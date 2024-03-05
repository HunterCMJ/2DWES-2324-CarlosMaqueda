<?php
function select_reserva(){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT distinct id_reserva as id_reserva FROM reservas where dni_pasajero=:dni_pasajero"); 
        $stmt->bindParam(":dni_pasajero",$_SESSION['dni']);
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
        $stmt = $conexion->prepare("SELECT origen,destino,fechahorasalida,fechahorallegada,nombre_aerolinea from vuelos INNER JOIN reservas on vuelos.id_vuelo=reservas.id_vuelo INNER JOIN aerolineas on vuelos.id_aerolinea = aerolineas.id_aerolinea and dni_pasajero='11111111A'; "); 
        $stmt->bindParam(":id_reserva",$reserva);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    return $resultado;
}