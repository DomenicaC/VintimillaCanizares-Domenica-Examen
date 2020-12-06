<?php
include "conexion/conexionBD.php";
include "carrito.php";
include "template/cabecera.php";
?>


<div class="container">

    <br>
    <?php if ($mensaje != "") { ?>
        <div class="alert alert-success">

            <?php echo $mensaje; ?>
            <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
        </div>
    <?php } ?>

    <div class="row">
        <?php
        $sql = "SELECT * FROM comida";
        $resultado = $conn->query($sql);
        $cont = 1;
        if ($resultado->num_rows > 0) {
            //echo $resultado->num_rows;
            while ($row = $resultado->fetch_assoc()) {
                //var_dump($row);
                echo '<div class="col-3">';
                echo '<div class="card">';
                echo    '<img title="' . $row['com_comida'] . '" class="card-img-top" src="' . $row['com_imagen'] . '" alt="' . $row['com_comida'] . '">';
                echo    '<div class="card-body">';
                echo    '<h5 class="card-title">$' . $row['com_precio'] . '</h5>';
                echo    '<p class="card-text">' . $row['com_comida'] . '</p>';

                echo '<form action="" method="post">';
                echo '<input type="hidden" name="codigo" id="codigo" value="' . $row['com_codigo'] . '">';
                echo '<input type="hidden" name="nombre" id="nombre" value="' . $row['com_comida'] . '">';
                echo '<input type="hidden" name="precio" id="precio" value="' . $row['com_precio'] . '">';
                echo '<input type="hidden" name="cantidad" id="cantidad" value="' . $cont . '">';

                echo  '<button class="btn btn-primary" name="btnAccion" value="agregar" type="submit">Agregar al carrito</button>';
                echo '</form>';


                echo    '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
    <?php
    include "template/pie.php"
    ?>