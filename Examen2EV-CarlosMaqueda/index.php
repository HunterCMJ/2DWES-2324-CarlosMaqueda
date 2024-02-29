<?php

session_start();

if (isset($_SESSION['nombre'])) {

    header("Location: ./controllers/vinicio_controller.php");

} else {

    
    header("Location: ./controllers/vlogin_controller.php");
}