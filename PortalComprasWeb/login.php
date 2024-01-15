<?php 
    if (isset($_SESSION["PHPSESSID"])) {

        session_unset();
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");
    }
    
    session_start();
    
    include './functions.php';
    include './config.php';

?>

<body>

    <h2>Iniciar Sesión</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>
        <label for="name">Usuario:</label>
        <input type="text" id="user" name="user" required ><br>

        <label for="surname">Contraseña:</label>
        <input type="text" id="password" name="password" required ><br>

        <input type="submit" value="Iniciar Sesión">
    </form>

</body>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userform = limpiar_campo($_POST['user']);
    $passwordform = limpiar_campo($_POST['password']);

    try {
        //sentencia
        $stmt = $conn->prepare("SELECT user,psswd FROM users where user=:user");//se podria realizar en la misma consulta, donde tengan que coincidir usuario y contraseeña. Algo asi como select from where usuario=usuario and contraseña=contraseña. 
        //Posteriormente, si devuelve algo, es que es correcto, si no, contraseña incorrecta.
        //parametros
        $stmt->bindParam( ':user', $userform);
        //ejecucion
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    var_dump($resultado);
    if (!$resultado == null) {
        $password = $resultado[0]['psswd'];
        //si la contraseña de mi bdd, es la misma que la del formulaio, entra y guarda la sesion.

        if ($password == $passwordform) {
            $_SESSION['usuario'] = $resultado[0]['user'];
            header("Location: ./comaltapro.php");
        } else {

            echo "Contraseña incorrecta para el usuario $userform";
        }
    } else {
        echo "No existe el usuario $userform ";
    }
    
    
   
}



?>