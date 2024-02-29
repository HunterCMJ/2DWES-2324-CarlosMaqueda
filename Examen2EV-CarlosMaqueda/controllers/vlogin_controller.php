<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require_once("./functions/loginfunctions.php");

    $email = limpiar_campo($_POST["usuario"]);
    $psswd_user = limpiar_campo($_POST["password"]);

    //model
    require_once("../db/vconfig.php");
    require_once("../models/vlogin_model.php");

   
    if ( select_login($email, $psswd_user)) {

       header("location: ./vinicio_controller.php");

    } else {
       require_once("../views/vlogin_error.php");
    }
}

require_once("../views/vlogin.php");
