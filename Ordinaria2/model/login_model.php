<?php
require_once("../db/config.php");

function login($usuario,$clave){

    global $conexion;

    try {
       $stmt=$conexion ->prepare("SELECT CustomerId,FirstName,LastName,Address,City,Country,Email FROM customer where Email=:Email");
       $stmt->bindParam(':Email',$usuario);
       $stmt->execute();
       $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $resultado=$stmt->fetchAll();
       

    } catch (PDOException $e) {
        echo "Error".$e->getMessage();
    }
   

    if (sizeof($resultado)!==0) {

        $resultado=$resultado[0];

        if ($usuario==$resultado['Email']&& $clave==strrev($resultado['LastName'])) {
        
            session_start();
            $_SESSION['usuario']=$resultado['Email'];
            $_SESSION['nombre']=$resultado['FirstName'];
            $_SESSION['apellido']=$resultado['LastName'];
            $_SESSION['direccion']=$resultado['Address'];
            $_SESSION['ciudad']=$resultado['City'];
            $_SESSION['pais']=$resultado['Country'];
            $_SESSION['id']=$resultado['CustomerId'];
            return true;
    
            
    
        }else{
            return false;
        }

    }else{
        return false;
    }
    

    
}

?>