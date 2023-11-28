<HEAD> <TITLE> VALIDACIONES EN FORMULARIOS  </TITLE>
</HEAD>
<BODY>


<H1> Validaciones de formularios </h1>
<form name='mi_formulario' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>

Cod_dpto:
<input type='text' name='cod_dpto' value='' size=15><br><br>
Nombre:
<input type='text' name='nombre_dpto' value=''><br><br>

<input type="submit" value="Crear DPTO">

</FORM>
</BODY>

<?php
/*Inserción en tabla Prepared Statement- mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleados1n";

if($_SERVER['REQUEST_METHOD']=="POST"){

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES (:cod_dpto,:nombre_dpto)");//:nombrevariable, son variables de bind. Algo asi como placeholders
    
    $stmt->bindParam(':cod_dpto', $cod_dpto);
    $stmt->bindParam(':nombre_dpto', $nombre_dpto);
  
    // insert a row
    $cod_dpto = $_POST['cod_dpto'];
	$nombre_dpto = $_POST['nombre_dpto'];
    $stmt->execute();

   

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}

?>
