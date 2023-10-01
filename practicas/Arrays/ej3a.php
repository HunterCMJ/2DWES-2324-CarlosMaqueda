

<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
/*
    Programa ej3a.php definir un array y almacenar los 20 primeros números binarios. Mostrar en la salida 
una tabla como la de la figura
*/

$arrayBinario=array(); $numero=""; $arrayOctal=array();
//creo el array y lo lleno hasta el numero indicado
while ($numero<20) {

    $numero++;
    $arrayBinario[]=$numero;
}   
//recorro el array y convierto cada valor a su binario. Machaco los valores anteriores
foreach ($arrayBinario as $key => $value) {
    
    $arrayBinario[]=decbin($value);

}
//recorro el array y convierto el arraybinario en octal, lo guardo en un nuevo array
foreach ($arrayBinario as $key => $value) {
    
    $arrayOctal[]=decoct($value);

}

//a fin de separar la parte del codigo (logica de negocio) de lo que se imprime por pantalla:
//añadimos una pequeña figura de control. Queremos que los arrays sean del mismo tamaño. Ya que hay uno para el binario y otro para el octal. 
 
echo "<table border=1><th>Indice</th> <th>Binario</th> <th>Octal</th>";
//formas de imprimirlo por pantalla
/*
for ($i=0; $i < count($arrayOctal); $i++) { 
    printf("<tr> <td>$i</td> <td>$arrayBinario[$i]</td> <td>$arrayOctal[$i]</td> </tr>");
}    
*/
for ($i=0; $i < count($arrayOctal); $i++) { 
    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $arrayBinario[$i] </td>";
    echo "<td> $arrayOctal[$i] </td>";
    echo "</tr>";
}    

?>

 