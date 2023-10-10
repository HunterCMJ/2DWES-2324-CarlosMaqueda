
<HTML>

<BODY>

    <Header><h1>Conversor Binario</h1></Header>

    

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