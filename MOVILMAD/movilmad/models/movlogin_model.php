<?php
function select_login($email,$psswd){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT nombre,idcliente,email FROM rclientes where email=:email"); 
        $stmt->bindParam(':email', $email);
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

  

    if (sizeof($resultado) != 0) {

        $psswdBaseDatos = $resultado[0]['idcliente'];
        //si la contraseña de mi bdd, es la misma que la del formulaio, entra y guarda la sesion.

        if ($psswdBaseDatos == $psswd) {
            session_start();
            $_SESSION['nombre'] = $resultado[0]['nombre'];
            $_SESSION['idcliente'] = $resultado[0]['idcliente'];

            return true;
        } else {

            return false;
        }
    } else {
        return false;
    }
}




