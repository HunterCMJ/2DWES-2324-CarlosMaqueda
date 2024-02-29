<?php
function select_login($dni,$psswd){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT dni,nombre,apellidos,email FROM pasajero where dni=:dni"); 
        $stmt->bindParam(':dni', $dni);
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

  

    if (sizeof($resultado) != 0) {

        $psswdBaseDatos = substr($resultado[0]['dni'],0,4);
        //si la contraseña de mi bdd, es la misma que la del formulaio, entra y guarda la sesion.
        
        
        if ($psswdBaseDatos == $psswd) {
            session_start();
            $_SESSION['user'] = $resultado[0]['nombre'].' '.$resultado[0]['apellidos'];
            $_SESSION['email'] = $resultado[0]['email'];
            $_SESSION['dni'] = $resultado[0]['dni'];
            $_SESSION['fecha']=date("y-m-d");

            return true;
        } else {

            return false;
        }
    } else {
        return false;
    }
}




