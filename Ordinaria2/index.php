<?php
session_start();

if (!isset($_SESSION['ususario'])) {
    header('Location: ./controller/login_controller.php');
}else{
    header('Location: ./controller/inicio_controller.php');
}


?>