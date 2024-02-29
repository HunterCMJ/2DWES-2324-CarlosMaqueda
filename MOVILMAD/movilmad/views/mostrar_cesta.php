<?php

$user = $_SESSION['user'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          table,td,th {
            border: 2px solid green;
            width: 50%;
        }
     
    </style>
    <title>Document</title>
</head>

<body>

    <h3>
        Carrito de <?php echo ($user); ?> ID: <?php echo ($id); ?>
    </h3>
    <div>
    <table >
        <tr>
            <th>Matrícula</th>
            <th>Precio</th>
            <th>Hora Alquiler</th>

        </tr>
        <?php foreach ($carrito as $matricula=>$datos) { ?>
            <tr>
                <td>
                    <?php echo $matricula; ?>
                </td>

                <?php foreach ($datos as $detalle) { ?>
                    <td>
                        <?php echo $detalle; ?>
                    </td>

                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    </div>
    
</body>

</html>