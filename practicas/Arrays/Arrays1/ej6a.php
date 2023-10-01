<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
/*
    Programa ej6a.php mostrar el array resultante del ejercicio anterior en orden inverso. Previamente, se 
    deberá borrar el módulo mecanizado que no se imparte en el ciclo DAW.
*/

$arrayTotal=array();
$array1=array("Bases Datos", "Entornos Desarrollo", "Programación"); 
$array2=array("Sistemas Informáticos","FOL","Mecanizado");
$array3=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");


$arrayMerged=array();
$arrayMerged=array_merge($array1, $array2, $array3);
print_r($arrayMerged);
echo "<br><br>";


//con la funcion unset eliminaremos un array. Con array_search, podremos comprobar si el elemento existe. 
$key=array_search("Mecanizado", $arrayMerged);//localizo el elemento del array
unset($arrayMerged[5]);//con esta funcion, el array resultante, sigue siendo el mismo, por lo que la clave X ya no esta en el array. 

print_r($arrayMerged);

//invertimos el array: 
$ArrayMergedInverted=array_reverse($arrayMerged);//al invertirlo, las claves se reorganizan. 
print_r($ArrayMergedInverted);