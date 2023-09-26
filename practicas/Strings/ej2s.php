<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<H1>Carlos Maqueda: Ejercicio 1 Cadenas</H1>
<?php

/*
Realizar el mismo programa del ejercicio anterior pero sin utilizar las funciones printf 
o sprint
Enunciado anterior: 

Convertir la IP a su representación en binario haciendo uso de la función printfo sprintf. 
Únicamente se podrán utilizar funciones de cadenas de caracteres

*/


$ip="198.18.16.204";

//con la funcion explode separo cada bloque de octetos. 

$IpExploded=explode(".", $ip);
print_r($IpExploded);
print "<br><br>";

foreach ($IpExploded as $octeto) {
   $IpBinary[]=str_pad(decbin($octeto),8,"0", STR_PAD_LEFT ); 
   //otra forma seria convertir primero el octeto a binario fuera de la funcion str_pad.
   //la funcion matematica decbin convierte el valor x a binario
   //la funcion str_pad, sirve para, dado un String, añadir x numero de caracteres a la izquiera o a la derecha o a ambos lados. 

}
print_r($IpBinary);
print "<br><br>";
//usaremos la funcion implode para unificar el array de nuevo en un string

echo "La ip $ip en codigo binario es " . implode(".",$IpBinary);
?>