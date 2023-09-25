<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<H1>Carlos Maqueda: Ejercicio 1 Cadenas</H1>
<?php
/*ENUNCIADO
Convertir la IP a su representación en binario haciendo uso de la función printfo sprintf. 
Únicamente se podrán utilizar funciones de cadenas de caracteres.
*/
$ip="192.18.16.204";//declaramos las variables con $nombreVariable. 
//funcionan las ip
//comenzando con php

//Con Explode vamos a convertir la cadena de texto en un array, separado por el patron que nosotros le indiquemos. En este caso por un punto. 
//usaremos la funcion print_r para mostrar el array con su posicion asignada. Asi sabemos exactamente en que posicion esta cada uno.
/*De hecho, hay unicamente dos formas de imprimir arrays predeterminadas por el sistema
print_r, y var_dump. 
Var_dump muestra algo mas de informacion. 
numero de elementos del array.
y en cada posicion del array, el tipo de dato junto con el numero de caracteres. 

array(3) {
  [0]=>
  string(5) "apple"
  [1]=>
  string(6) "banana"
  [2]=>
  string(6) "cherry"
}
*/

//guardamos la descomposicion de la cadena en una variable con un nombre significativo

$arrayIpDecomposed=explode(".", $ip);

//Muestro el contenido del array por pantalla, por gusto. 

print_r($arrayIpDecomposed);

//vamos a usar un foreach para recorrer el array
foreach ($arrayIpDecomposed as $octetos) {
	//dentro del foreach vamos a crear un array que almacene los nuevos valores
	$array_octeto[]=sprintf("%08b",$octetos);
}
print_r($array_octeto) . "<br><br>";
//hemos usado explode para separar el string.
//usamos implode para unirlo de nuevo(con el patron que queramos)
$ipBinary=implode(".", $array_octeto);
echo "la ip $ip en codigo binario es $ipBinary";
?>

</BODY>
</HTML>