<?php

    session_start();

    include './functions.php';

    $user = $_SESSION['user'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title> $user</title><H1> Bienvenido $user </H1>" ;?>
</head>

<body>
    
    <a href="./pe_altaped.php"><button>Hacer Pedido</button></a>
    <a href="./pe_login.php"><button>Volver a Inicio de sesion</button></a>


</body>