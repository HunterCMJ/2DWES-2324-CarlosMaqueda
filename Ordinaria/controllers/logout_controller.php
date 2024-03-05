<<<<<<< HEAD
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
=======
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
>>>>>>> 8698404c50d057c578f2f96dc3177ae54fdd1eb2
