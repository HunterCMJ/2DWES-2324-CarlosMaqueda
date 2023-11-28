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
<input type='text' name='salario' value='' size=4><br><br>
Cod_dpto:
<input type='text' name='cod_dpto' value=''><br><br>
fecha Nacimiento aaaa-mm-dd
<input type='date' name='fecha_nac' value=''><br><br>

<input type="submit" value="Crear DPTO">

</FORM>
</BODY>

<?php
/*Inserción en tabla Prepared Statement- mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

if($_SERVER['REQUEST_METHOD']=="POST"){

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO empleado (dni,nombre_emple,salario,cod_dpto,fecha_nac) VALUES (:dni,:nombre_emple,:salario,:cod_dpto,:fecha_nac);");
   
    //:nombrevariable, son variables de bind. Algo asi como placeholders
    
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':nombre_emple', $nombre_emple);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':cod_dpto', $cod_dpto);
    $stmt->bindParam(':fecha_nac', $fecha_nac);
    // insert a row
    $dni = $_POST['dni'];
	$nombre_emple = $_POST['nombre_emple'];
    $salario = $_POST['salario'];
    $cod_dpto = $_POST['cod_dpto'];
    $fecha_nac = $_POST['fecha_nac'];
    

    /**************************************************/

    $stmt2=$conn -> prepare("INSERT INTO emple_dpto (dni,cod_dpto,fecha_ini,fecha_fin) VALUES (:dni,:cod_dpto,:fecha_ini,:fecha_fin)");

    $stmt2->bindParam(':dni', $dni);
    $stmt2->bindParam(':cod_dpto', $cod_dpto);
    $stmt2->bindParam(':fecha_ini', $fecha_ini);
    $stmt2->bindParam(':fecha_fin', $fecha_fin);
    
    
    $fecha_ini = date("Y-m-d");
    $fecha_fin=null;


    $stmt->execute();
    $stmt2->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
var_dump($fecha_ini);

}

?>
