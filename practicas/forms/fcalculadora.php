<HTML>
   
    <BODY>
    
        <Header style="text-align: center;">
            <H1>Calculadora</H1>
        </Header>
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    
                Operando1
                <input type="number" name="valor1" value="">
                <br>
                <br>
                Operando2
                <input type="number" name="valor2" value="">
                <br><br>
                Selecciona la operacion:
                <br>
                <br>
                <input type="radio" name="op" value="sum">Suma
                <br>
                <input type="radio" name="op" value="resta">Resta
                <br>
                <input type="radio" name="op" value="mult">Multiplicacion
                <br>
                <input type="radio" name="op" value="div">Division
    
                <br>
                <br>
    
                <button type="submit">Enviar</button>
                <button type="reset">Borrar</button>
    
            </form>
        </div>
    
    <?php
    
    include './Functions/funcionesCalculadora.php';
    
    

    $numero1=$_REQUEST['valor1'];
    $numero2=$_REQUEST['valor2'];
    $opcion=$_REQUEST['op'];
    
    
    
    switch ($opcion) {
    
        case 'sum':
            $resultado=suma($numero1, $numero2);
            $signo='+';
            break;
        
        case 'resta':
    
            $resultado=resta($numero1, $numero2);
            $signo='-';
            break;
        
        case 'mult':
            $resultado=multip($numero1, $numero2);
            $signo='x';
            break;
        
        case 'div':
            $resultado=division($numero1, $numero2);
            $signo='/';
            break;
    
    }
    
    
    
    echo "Resultado de la operacion $numero1 $signo $numero2 = $resultado";
    
    
    ?>
    