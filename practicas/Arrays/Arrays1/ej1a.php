<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<H1>Carlos Maqueda: Ejercicio 1 Arrays</H1>
<h1>Tabla Suma Impares</h1>
    <table border="1" border-collapse=collapse>
        <th>Indice</th>
        <th>Valor</th>
        <th>Suma</th>

<?php
/*
    Definir un array y almacenar los 20 primeros números impares. Mostrar en la salida 
    una tabla como la de la figura
*/


//primero calculamos los numeros impares y los guardamos en un array. 

$numImpar=""; $i="1"; $arrayImpares[]="1";


while (count($arrayImpares) <=20 ) {

    $i++;

    if ($i % 2 != 0 ) {

        $arrayImpares[]=$i;
        
    }
    
}
    
print_r($arrayImpares);
//ya tenemos el array con los numeros impares generado. 
foreach ($arrayImpares as $index => $impar) {
    $suma=$index + $impar;
    echo "<tr>";
   echo "<td> $index </td>";
   echo "<td> $impar </td>";
   echo "<td> $suma </td>";
   echo "</tr>";    
}
?>