<HEAD>
    <TITLE> COMPRAS WEB </TITLE>
</HEAD>

<BODY>
    
    <?php
    session_start();

    include './functions.php';
    include './config.php';

    try {

        $stmt = $conn->prepare("SELECT nombre FROM categoria"); //selecciono los datos de la tabla categoria
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ConsultaCategoria = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

    ?>


    <H1> AltaCategoría </h1>
    <?php
        $usuario= $_SESSION["usuario"];
        echo "<H2>Bienvenido $usuario<H2>";
    ?>
    <form name='mi_formulario' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>

        

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>
            
            Nombre Producto
            <input type='text' name='categoria' value='' size=15><br><br>
            <br>
            Elija una categoria
            <select name="cars" id="cars">

                <?php
                foreach ($ConsultaCategoria as $row) {
                    echo "<option value=$row[nombre]>$row[nombre]</option>";
                }
                ?>
            </select>

            <br><br>
            <input type="submit" value="Submit">
            <br><br>
            <input type="submit" name="accion" value="Cerrar Sesion">


        </form>


    </FORM>
    
</BODY>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (($_POST["accion"]=="Cerrar Sesion")) {
      header("Location: ./login");
    }
   
}


