<?php
function select_login($email,$psswd){

    global $conexion;

    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT CustomerId,FirstName,LastName,Address,City,Country,Email FROM customer where Email=:Email"); 
        $stmt->bindParam(':Email', $email);
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

  

    if (sizeof($resultado) != 0) {

        $psswdBaseDatos = $resultado[0]['LastName'];
        //si la contraseña de mi bdd, es la misma que la del formulaio, entra y guarda la sesion.
        
        
        if ($psswdBaseDatos == $psswd) {
            session_start();
            $_SESSION['Id'] = $resultado[0]['CustomerId'];
            $_SESSION['Name'] = $resultado[0]['FirstName'].' '.$resultado[0]['LastName'];
            $_SESSION['Address']=$resultado[0]['Address'];
            $_SESSION['City']=$resultado[0]['City'];
            $_SESSION['Country']=$resultado[0]['Country'];
            $_SESSION['Email'] = $resultado[0]['Email'];

            return true;

        } else {

            return false;
        }
    } else {
        return false;
    }
}




