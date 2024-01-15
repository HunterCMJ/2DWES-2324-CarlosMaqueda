<?php



function mostrar_tabla($resultado)//una funcion para mostrar la tabla por pantalla
{
    echo "<table style='border: 2px solid black; border-collapse:collapse ; font-size: 20px;'>";

    foreach ($resultado as $row) {

        foreach ($row as $campo => $valor) {

            echo "<tr>";
            echo "<th style='border: 2px solid black'> $campo </th>";
            echo "<td style='border: 2px solid black'> $valor</td> ";
            echo "</tr>";
        }
        
    }

}

function rellenarCategoria($nombre,$conn){

    $ConsultaTabla = $conn->prepare("SELECT MAX(ID_CATEGORIA) as MAX FROM categoria");//selecciono los datos de la tabla categoria

    $ConsultaTabla->setFetchMode(PDO::FETCH_ASSOC);
    $ConsultaTabla->execute();
    

    $resultado = $ConsultaTabla->fetchAll();//recojo datos 
    
   
    
    
    if ($resultado[0]['MAX']==null) {//si la consulta no devuelve ningun valor, el alta será a c-001

       $Id_categoria="C-001";

    }else{//si devuelve algo entonces:

        $num_orden=explode("C-",$resultado[0]['MAX']);//sacamos el valor numerico con explode. Para saber que categoria es la que nos ha devuelto. 
        //como todas las categorias empiezan por 'C-', podemos entonces utilizarlo para extraer el valor numerico.
        
        $Id_categoria=$num_orden[1]+1;//explode devuelve siempre un string con el valor anterior y posterior al patron. Ergo, como el patrón es c-, devuelve 0 y el numero de la categoria.
        //A ese numero le sumamos un 1, para obtener el siguiente 

        
        $numregistros=str_pad($Id_categoria, 3, '0', STR_PAD_LEFT);//vamos a completar el string con 0 para rellenar el 
        $Id_categoria= "C-".$numregistros;
    }
    

    $stmt3=$conn->prepare("INSERT INTO categoria (ID_CATEGORIA,NOMBRE) VALUES (:id_categoria, :nombre)");
    $stmt3-> bindParam(':id_categoria',$Id_categoria);
    $stmt3-> bindParam(':nombre',$nombre);


    


    return $stmt3;



}

function limpiar_campo($campoformulario) {
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);  
  
    return $campoformulario;
     
  }