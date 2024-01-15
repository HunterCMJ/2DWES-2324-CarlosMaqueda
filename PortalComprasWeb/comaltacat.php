<HEAD>
    <TITLE> COMPRAS WEB </TITLE>
</HEAD>

<BODY>

    <H1> AltaCategoría </h1>
    <form name='mi_formulario' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>

        Nombre Categoría
        <input type='text' name='categoria' value='' size=15><br><br>

        <input type="submit" value="Crear categoría">



    </FORM>
</BODY>

<?php

include './functions.php';
include './config.php';

/*SELECTs - mysql PDO*/

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    try {

        $stmt3 = rellenarCategoria($_POST['categoria'], $conn);
        $stmt3->execute();

        $IMPRIMIRTABLA = $conn->prepare("SELECT * FROM categoria"); //selecciono los datos de la tabla categoria
        $IMPRIMIRTABLA->execute();
        $IMPRIMIRTABLA->setFetchMode(PDO::FETCH_ASSOC);
        $IMPRIMIRTABLA = $IMPRIMIRTABLA->fetchAll();
        mostrar_tabla($IMPRIMIRTABLA);
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>