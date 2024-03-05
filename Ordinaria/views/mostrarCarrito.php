
<?php if (isset($carrito)) { ?>
<h4>Canciones de <?php echo $Name ?></h3>
    <table>

        <tr>
            <th>Id</th>
            <th>Cantidad</th>
            <th>Precio</th>

        </tr>

        <?php foreach ($carrito as $canciones) { ?>
            <tr>
                <?php foreach ($canciones as $key => $value) { ?>

                    <td><?php echo $value; ?></td>

            <?php }
            } ?>
            </tr>

            </tr>
    </table>
    <?php } ?>
