<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <Header style="text-align: center;">
        <H1>Conversor Binario</H1>
    </Header>
    <div >
        <form name="Calculadora" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
            NumeroDecimal
            <input type="number" name="valor" value="">
            <br><br>
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
            <br><br>
        </form>
</body>



<HTML>

<?php

include './Functions/funcionesBinario.php';
$valor='';
$valor=test_input($_REQUEST['valor']);

$binario=decbin($valor);

//esta funcion, limpia la cadena de texto introducida. 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "numero decimal : $valor";
echo '<br>';
echo "numero decimal : $binario";


?>


</html>

