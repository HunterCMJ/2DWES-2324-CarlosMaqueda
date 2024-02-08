<?php 
    
    if (isset($_SESSION['user'])) {

        session_unset();
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");
    }
    
    include './functions.php';
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $userform = limpiar_campo($_POST['user']);
        $passwordform = limpiar_campo($_POST['password']);
        
        require_once("../models/pe_login_model.php");
        
       
    }

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
