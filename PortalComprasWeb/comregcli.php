<?php

include './functions.php';
include './config.php';



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>

    <h2>Crear Cuenta</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="surname">Apellido:</label>
        <input type="text" id="surname" name="surname" required><br>

        <input type="submit" value="Registrar Usuario">
    </form>

</body>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user = limpiar_campo($_POST['name']);

    $psswd = limpiar_campo($_POST['surname']);

    $psswd = strrev($psswd);


    try {

        $stmt = $conn->prepare("INSERT INTO users (user, psswd) VALUES (:user, :psswd);"); //guardo los datos de usuario y contraseña en la bd

        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':psswd', $psswd);
        $stmt->execute();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    header("Location: ./login.php");
}




//CREAR Y ALMACENAR EL USUARIO EN LA BD










?>