<?php

session_start();

if (isset($_SESSION['nombre'])) {

   header("Location: ./controller/movwelcome_controller.php");

} else {

    header("Location: ./controller/movlogin_controller.php");
}