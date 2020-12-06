<?php
include "conexion/conexionBD.php";
include "carrito.php";
include "template/cabecera.php";
?>

<br>
<h3>Lista del carrito</h3>

<?php
if (!empty($_SESSION['CARRITO'])) { ?>

    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <th width="40%">Nombre</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="5%">--</th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>

                <tr>
                    <td width="40%"><?php echo $producto['Nombre'] ?> </td>
                    <td width="15%" class="text-center"><?php echo $producto['Cantidad'] ?> </td>
                    <td width="20%" class="text-center"><?php echo $producto['Precio'] ?> </td>
                    <td width="20%" class="text-center"><?php echo number_format($producto['Cantidad'] * $producto['Precio'], 2); ?> </td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="codigo" value="<?php echo $producto['Codigo']; ?>">
                            <button class="btn btn-danger" type="submit" name="btnAccion" value="eliminar">Eliminar</button>
                        </form>
                    </td>

                </tr>
                <?php $total = $total + ($producto['Cantidad'] * $producto['Precio']); ?>
            <?php } ?>
         

            <tr>
                <td colspan="3" align="right">
                    <h3>Total</h3>
                </td>
                <td align="right">
                    <h3> <?php echo number_format($total, 2); ?> </h3>
                </td>
                <td align="right"></td>
            </tr>

        </tbody>
    </table>

<?php } else { ?>

    <div class="alert alert-success">No hay productos en el carrito</div>

<?php } ?>


<?php
include "template/pie.php"
?>