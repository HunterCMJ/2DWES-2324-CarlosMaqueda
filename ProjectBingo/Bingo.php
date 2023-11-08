<HTML>

<HEAD>
    <TITLE>BINGO</TITLE>
    <style>
        table,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 1em;
            font-size: 1.5rem;
        }
        p{
            font-size: 20px;
        }
    </style>
</HEAD>

<?php


include './FunctionsBingo/CrearJugCart.php';

// Creamos el Bombo. 
$Bombo = CrearBombo();

//A fin de tener el mayor control posible sobre el programa, 
// antes de crear jugadores, voy a crear los usuarios que quieran jugar.

$User1 = CrearJugador();
$User2 = CrearJugador();
$User3 = CrearJugador();
$User4 = CrearJugador();

//Pasamos cada usuario, con el numero de cartones que va a tener. 
//De esta forma le convertimos en jugador.


$Jugador1 = LlenarCartones($User1, 4);
$Jugador2 = LlenarCartones($User2, 4);
$Jugador3 = LlenarCartones($User3, 4);
$Jugador4 = LlenarCartones($User4, 4);



//Vamos a Jugar al Bingo
//Tecnicamente, se debe de realizar el juego hasta que se terminen las bolas.

//Para ello vamos a "dar" a cada jugador, un papel en blanco sobre el que poder anotar los numeros que tiene. 
//es bidimensional. Para cada carton, un array que tenga a su vez los numeros.

$AnotadosJ1 = array(array());
$AnotadosJ2 = array(array());
$AnotadosJ3 = array(array());
$AnotadosJ4 = array(array());

//el bingo esta en marcha hasta que alguien gana.
$ganador = false;

while ($ganador == false) {

    $Numero = SacarNumero($Bombo);

    //Voy a comprobar por cada jugador el numero.
    //Si toca, lo voy a anotar en esa carpeta en blanco.

    $AnotadosJ1 = Comprobar($Jugador1, $Numero, $AnotadosJ1);
    $AnotadosJ2 = Comprobar($Jugador2, $Numero, $AnotadosJ2);
    $AnotadosJ3 = Comprobar($Jugador3, $Numero, $AnotadosJ3);
    $AnotadosJ4 = Comprobar($Jugador4, $Numero, $AnotadosJ4);
}


$Ganador = CartonJugadorGanador($AnotadosJ1, $AnotadosJ2, $AnotadosJ3, $AnotadosJ4);


$CartonGanador = $Ganador["keycarton"];
$JugadorGanador = $Ganador["keyjugador"];
$JugadorCompleto = $Ganador["jugador"];


echo "<p>Ha ganado el jugador " . $JugadorGanador . " con el carton " . $CartonGanador . "<p/>";

$CartonCompleto = $JugadorCompleto[$CartonGanador];
//necesitamos rellenar una cuadra de 3*7
//como son 21 numeros en total, vamos a meter de forma aleatoria, valores nulos en el array. 
for ($i = 0; $i < 6; $i++) {

    array_splice($CartonCompleto, rand(0, 14), 0, [null]);
}

$CartonImpreso = array_chunk($CartonCompleto, 7);


//al igual que una variable de incremento o contador
//vamos a crear una hoja donde ir anotando el resultado
//esa hoja va a ir creciendo en funcion de los numeros que toquen


echo "<table>";
for ($i = 0; $i < 3; $i++) {
    echo '<tr>';
    for ($j = 0; $j < 7; $j++) {

        echo '<td> ' . $CartonImpreso[$i][$j] . '</td>';
    }
    echo '</tr>';
}
echo "<table>";

for ($i=0; $i < count($CartonCompleto); $i++) { 
    
    echo "<img src='./images/$CartonCompleto[$i].png' alt=''>";

}

