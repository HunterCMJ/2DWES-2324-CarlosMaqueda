<?php

function CrearBombo()
{

    // $numero=array_shift($Bombo);

    // return $numero;

    for ($i = 1; $i <= 60; $i++) {
        $Bombo[] = $i;
    }
    return $Bombo;
}

function CrearJugador()
{
    return array();
}

function LlenarCartones($user, $total)
{
    for ($i = 0; $i < $total; $i++) {

        $Carton = array();

        while (count($Carton) < 15) { //mientras que el carton no tenga 15 numeros sigue.

            $Random = rand(1, 60);

            if (!in_array($Random, $Carton)) {
                //si el numero no esta en el array, lo incluye.
                $Carton[] = $Random;
            }
        }

        $user[] = $Carton;
    }

    return $user;
}

function SacarNumero(&$Bombo)
{

    shuffle($Bombo);
    $Numero = array_shift($Bombo);

    return $Numero;
}

function Comprobar($Jugador, $NumBombo, &$Anotados)
{
    //se recorrerá como tantos cartones tenga el jugador
    for ($i = 0; $i < count($Jugador); $i++) {
        //meto el carton en una variable para controlarlo
        $Carton = $Jugador[$i];
        //el numero solo puede estar una vez en el carton
        if (in_array($NumBombo, $Carton)) {

            //si lo encuentra, lo mete en el carton que sea, 
            //en la posicion que le corresponde
            $Anotados[$i][] = $NumBombo;

            if (count($Anotados[$i]) > 14) {

                //si el carton que acabo de rellenar tiene mas de 14 posiciones rellenas,
                //quiere decir que hay ganador.
                //accedo a la variable ganador con el modificador global. Y cambio su valor
                global $ganador;
                $ganador = true;
            }
        }
    }

    return $Anotados;
}

function CartonJugadorGanador($AnotadosJ1, $AnotadosJ2, $AnotadosJ3, $AnotadosJ4)
{

    $todos = array($AnotadosJ1, $AnotadosJ2, $AnotadosJ3, $AnotadosJ4);


    foreach ($todos as $keyjug => $jugador) {
        foreach ($jugador as $keycart => $carton)

            if (count($carton) > 14) {

                $CartonJugador = array(
                    "keycarton" => $keycart,
                    "keyjugador" => $keyjug,
                    "jugador" => $jugador,


                );

                return $CartonJugador;
            }
    }
}
