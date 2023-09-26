<HTML>
<HEAD><TITLE> EJ3-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>

<?php

$ipMasc="192.168.16.100/16";
$ip="192.168.16.100";

echo "La ip en decimal es: $ip";     
echo"<br>";

//Pasamos la ip entera a binario/
$ip1 = decbin(ip2long($ip)); //funcion ip2long para convertir la $ip en formato largo de 32 bits
echo "La ip en binario es: $ip1","<br>";
echo"<br>";

//La mascara se encuentra detrás de la /, con lo cual usamos la funcion substr y almacenamos el resultado en una nueva variable a la que llamamos máscara
$mascara=substr($ipMasc,strpos($ipMasc,"/")+1);
echo "La mascara es: $mascara";
echo"<br>";

//Selecciono los 16 primeros numeros de la ip, y relleno con 0/
//Extraigo los dos primeros octetos que son los que necesito y los otros dos los relleno con 0
echo "La direccion de red es ";


$var1=substr($ip1,0,$mascara);
//la ip en binario que es 11000000.10101000.00010000.01100100, guardara los 16 primeros digitos, ya que $mascara es 16, se podria poner 16??, y empieza en la posicion 0, 
// que es la inicial, por lo tanto vari1 recogera: 11000000.10101000 , posteriormente en forma decimal, 192.168

$dired=str_pad($var1,32,"0"); 
//en $dired se va a guardar 11000000.10101000.00000000.00000000 (32 caracteres totales de relleno,los.no se cuentan
//a continuacion con substr extraemos los octetos, que estan de forma binaria y los transformamos a decimal con bindec.
echo (bindec(substr($dired,0,8))),".",
	 (bindec(substr($dired,8,8))),".",
	 (bindec(substr($dired,16,8))),".",
	 (bindec(substr($dired,24,8)));

echo"<br>";


//aqui hacemos el mismo proceso anterior 
//Selecciono los 16 primeros numeros de la ip, y relleno con 1/
echo "La direccion de broadcast es ";
$var1=substr($ip1,0,$mascara);
$dirbroad=str_pad($var1,32,"1"); //en este caso 11111111 en binario es 255 en decimal
//en $dired se va a guardar 11000000.10101000.11111111.11111111 (32 caracteres totales de relleno,los.no se cuentan
//a continuacion con substr extraemos los octetos, que estan de forma binaria y los transformamos a decimal con bindec.
echo (bindec(substr($dirbroad,0,8))),".",
	 (bindec(substr($dirbroad,8,8))),".",
	 (bindec(substr($dirbroad,16,8))),".",
	 (bindec(substr($dirbroad,24,8)));
	 
echo"<br>";

//Le sumamos 1 a la direccion de red y restamos 1 a la direccion de broadcast
echo "El rango de IPs es ";
echo (bindec(substr($dired,0,8))),".",
	 (bindec(substr($dired,8,8))),".",
	 (bindec(substr($dired,16,8))),".",
	 (bindec(substr($dired,24,8))+1); //192.168.0.1 

echo " a ";
echo (bindec(substr($dirbroad,0,8))),".",
	 (bindec(substr($dirbroad,8,8))),".",
	 (bindec(substr($dirbroad,16,8))),".",
	 (bindec(substr($dirbroad,24,8))-1); //192.168.255.254

?>

</BODY>
</HTML>