<?php
function select_vuelos(){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT id_vuelo,origen,destino,precio_asiento FROM vuelos where asientos_disponibles > 0;"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    return $resultado;
}
function select_MAX_reserva(){

    global $conexion;

    try {

        $stmt = $conexion->prepare("SELECT MAX(id_reserva) as max FROM reservas"); //selecciono los datos de la tabla producto

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $Consulta = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
   
    return $Consulta[0]['max'];
}

function insertupdate_reserva($conexion,$id_reserva,$idVuelo,$dni_pasajero,$fecha_reserva,$num_asientos,$preciototal){

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $stmt = $conexion->prepare("INSERT into reservas (id_reserva,id_vuelo,dni_pasajero,fecha_reserva,num_asientos,preciototal) values (:id_reserva,:id_vuelo,:dni_pasajero,:fecha_reserva,:num_asientos,:preciototal)");

        $stmt->bindParam(":id_reserva", $id_reserva);
        $stmt->bindParam(":id_vuelo", $idVuelo);
        $stmt->bindParam(":dni_pasajero", $dni_pasajero);
        $stmt->bindParam(":fecha_reserva", $fecha_reserva);
        $stmt->bindParam(":num_asientos", $num_asientos);
        $stmt->bindParam(":preciototal", $preciototal);
        
        $stmt->execute();

        $stmt1 = $conexion->prepare("UPDATE vuelos SET asientos_disponibles = asientos_disponibles - :num_asientos WHERE id_vuelo = :id_vuelo");

        $stmt1->bindParam(":id_vuelo", $idVuelo);
        $stmt1->bindParam(":num_asientos", $num_asientos);
        
        $stmt1->execute();
        
    } catch (Exception $e) {

        $conexion->rollBack();
        echo "Failed: " . $e->getMessage();
    }


}