

<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
/*
    Programa ej4a.php a partir del array definido en el ejercicio anterior crear un nuevo array que almacene 
    los números binarios en orden inverso.

*/

$arrayBinario=array(); $numero=""; $arrayOctal=array();

while ($numero<20) {

    $numero++;
    $arrayBinario[]=$numero;
}   
foreach ($arrayBinario as $key => $value) {
    
    $arrayBinario[]=decbin($value);

}
foreach ($arrayBinario as $key => $value) {
    
    $arrayOctal[]=decoct($value);

}
//invertimos el orden del array con la funcion. podemos elegir mantener la clave o no. 
$arrayReverso=array_reverse($arrayBinario);
 
echo "<table border=1><th>Indice</th> <th>Binario</th> <th>Reversed</th>";
/*
for ($i=0; $i < count($arrayOctal); $i++) { 
    printf("<tr> <td>$i</td> <td>$arrayBinario[$i]</td> <td>$arrayOctal[$i]</td> </tr>");
}    
*/
for ($i=0; $i < count($arrayOctal); $i++) { 
    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $arrayBinario[$i] </td>";
    echo "<td> $arrayReverso[$i] </td>";
    echo "</tr>";
}    

?>

 