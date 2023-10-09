<HTML>
<HEAD> <TITLE> VALIDACIONES EN FORMULARIOS  </TITLE>
</HEAD>
<BODY>
    <Header><h1>Calculadora</h1></Header>

<?php

include 'Functions/funcionesCalculadora.php';



$numero1=$_REQUEST['valor1'];
$numero2=$_REQUEST['valor2'];
$opcion=$_REQUEST['op'];



switch ($opcion) {
    
    case 'sum':
        $resultado=suma($numero1, $numero2);
        $signo='+';
        break;
    
    case 'resta':

        $resultado=resta($numero1, $numero2);
        $signo='-';
        break;
    
    case 'mult':
        $resultado=multip($numero1, $numero2);
        $signo='x';
        break;
    
    case 'div':
        $resultado=division($numero1, $numero2);
        $signo='/';
        break;

}



echo "Resultado de la operacion $numero1 $signo $numero2 = $resultado";


?>
