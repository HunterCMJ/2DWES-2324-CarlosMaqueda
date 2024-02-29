<?php
function insert_reserva(){

    global $conexion;

    $stmt = $conexion->prepare("INSERT into reservas (id_reserva,id_vuelo,dni_pasajero,fecha_reserva,num_asientos,preciototal) values (:id_reserva,:id_vuelo,:dni_pasajero,:fecha_reserva,:num_asientos,:preciototal)");

    $stmt->bindParam(":id_reserva", $id_reserva);
    $stmt->bindParam(":id_vuelo", $id_vuelo);
    $stmt->bindParam(":dni_pasajero", $dni_pasajero);
    $stmt->bindParam(":fecha_reserva", $fecha_reserva);
    $stmt->bindParam(":num_asientos", $num_asientos);
    $stmt->bindParam(":preciototal", $preciototal);
  

    $stmt->execute();
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