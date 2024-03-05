<<<<<<< HEAD
<?php

function limpiar_campo($campoformulario)
{
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);

    return $campoformulario;
}
=======
<?php

function limpiar_campo($campoformulario)
{
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);

    return $campoformulario;
}
>>>>>>> 8698404c50d057c578f2f96dc3177ae54fdd1eb2
?>