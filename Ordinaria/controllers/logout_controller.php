<?php

if (isset($_COOKIE['PHPSESSID'])) {

    session_start();
    session_unset();
    session_destroy();
    
    setcookie("PHPSESSID", "", time() - 3600, "/");

    header("Location: ../index.php");
} else {

    header("Location: ../index.php");
}
