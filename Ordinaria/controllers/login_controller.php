<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

require_once("./functions/loginfunctions.php");

$email = limpiar_campo($_POST["usuario"]);
$psswd_user = limpiar_campo($_POST["password"]);

//model
require_once("../db/config.php");
require_once("../models/login_model.php");


if (select_login($email, $psswd_user)) {
    
  header("location: ./inicio_controller.php");

} else {
    
   require_once("../views/login_error.php");
}
}

require_once("../views/login.php");
?>