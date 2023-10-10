<HTML>
<head></head>
<BODY>

    <Header><h1>Calculadora</h1></Header>

    
<?php

include './Functions/funcionesBase.php';



$valor=test_input($_REQUEST['valor']);

$option=test_input($_REQUEST['option']);



switch ($option) {

    case 'binario':
        $valorconv=decbin($valor);
        break;
    
    case 'octal':

        $valorconv=decoct($valor);
        break;
    
    case 'hex':
        $valorconv=dechex($valor);
        break;
    
    case 'all':
        $binario=decbin($valor);
        $octal=decoct($valor);
        $hex=dechex($valor);
        break;

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!empty($valorconv) ) {

    echo "Numero Decimal: $valorconv ";

}elseif($option='all'){

    echo "<table>
    <tr>
        <td>Binario</td>
        <td>$binario</td>
    </tr>
    <tr>
        <td>Octal</td>
        <td>$octal</td>
    </tr>
    <tr>
        <td>Hexadecimal</td>
        <td>$hex</td>
    </tr>
    </table>";

}





?>
