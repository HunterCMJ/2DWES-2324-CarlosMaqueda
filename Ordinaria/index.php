<?php

session_start();

if (isset($_SESSION['nombre'])) {

    header("Location: ./controllers/inicio_controller.php");

} else {

    
    header("Location: ./controllers/login_controller.php");
}