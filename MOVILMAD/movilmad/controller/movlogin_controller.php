<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require_once("./functions/movlogin_functions.php");

    $email = limpiar_campo($_POST["email"]);
    $psswd_user = limpiar_campo($_POST["password"]);

    //model
    require_once("../db/movdb.php");
    require_once("../models/movlogin_model.php");

    if (select_login($email, $psswd_user)) {
        header("location: ./movwelcome_controller.php");
    } else {
        header("location: ../index.php");
    }
}

require_once("../views/movlogin.php");
