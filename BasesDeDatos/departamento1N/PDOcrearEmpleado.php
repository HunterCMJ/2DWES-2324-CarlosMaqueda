<HEAD> <TITLE> VALIDACIONES EN FORMULARIOS  </TITLE>
</HEAD>
<BODY>


<H1> Validaciones de formularios </h1>
<form name='mi_formulario' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>

DNI
<input type='text' name='dni' value='' size=15><br><br>
Nombre empleado
<input type='text' name='nombre_emple' value='' size=15><br><br>
salario
<input type='text' name='salario' value='' size=15><br><br>
Cod_dpto:
<input type='text' name='cod_dpto' value=''><br><br>

<input type="submit" value="Crear Empleado">

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
    $stmt = $conn->prepare("INSERT INTO empleado (dni,nombre_emple,salario,cod_dpto) VALUES (:dni,:nombre_emple,:salario,:cod_dpto)");//:nombrevariable, son variables de bind. Algo asi como placeholders
    
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':nombre_emple', $nombre_emple);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':cod_dpto', $cod_dpto);
    // insert a row
    $dni = $_POST['dni'];
	$nombre_emple = $_POST['nombre_emple'];
    $salario = $_POST['salario'];
    $cod_dpto = $_POST['cod_dpto'];
    $stmt->execute();

    // insert another row
   /* $cod_dpto = 'D003';
	$nombre = 'COMPRAS';
    $stmt->execute();*/

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}

?>
