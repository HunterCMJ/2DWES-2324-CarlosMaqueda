
<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
/*
    Programa ej5a.php pdefinir tres arrays con los siguientes valores relativos a módulos que se imparten en 
    el ciclo DAW:
        “Bases Datos”, “Entornos Desarrollo”, “Programación”
        “Sistemas Informáticos”,”FOL”,”Mecanizado”
        “Desarrollo Web ES”,”Desarrollo Web EC”,”Despliegue”,”Desarrollo Interfaces”, “Inglés”
    Se pide:
        a. Unir los 3 arrays en uno único sin utilizar funciones de arrays
        b. Unir los 3 arrays en uno único usando la función array_merge()
        c. Unir los 3 arrays en uno único usando la función array_push(
*/

//apartado A
$arrayTotal=array();
$array1=array("Bases Datos", "Entornos Desarrollo", "Programación"); 
$array2=array("Sistemas Informáticos","FOL","Mecanizado");
$array3=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

foreach ($array1 as $key => $value) {
    $arrayTotal[] = $value;//la forma de realizar append "simple" es con esa estructura. Si no indicamos los corchetes, machaca la informacion. 
}
foreach ($array2 as $key => $value) {
    $arrayTotal[] = $value;
}
foreach ($array3 as $key => $value) {
    $arrayTotal[] = $value;
}


//APartado b

$arrayMerged=array();
$arrayMerged=array_merge($array1, $array2, $array3);


//Apartado c

$arrayPushed=array();
foreach ($array1 as $key => $value) {
    array_push($arrayPushed, $value);
}
foreach ($array2 as $key => $value) {
    array_push($arrayPushed, $value);
}
foreach ($array3 as $key => $value) {
    array_push($arrayPushed, $value);
}

?>  