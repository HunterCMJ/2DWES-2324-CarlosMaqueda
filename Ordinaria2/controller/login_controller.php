<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once("../functions/login_functions.php");

    $usuario=limpiar_campo($_POST['usuario']);
    $clave=limpiar_campo($_POST['password']);

    require_once("../db/config.php");
    require_once("../model/login_model.php");

    
   
    if(login($usuario,$clave)){
        $_SESSION['usuario']=$usuario;
        header('Location:./inicio_controller.php');
    }
  
}

include '../views/login.php';

?>