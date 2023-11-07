<?php

include("../DAO/dao.php");

$datos = new DAO();

$lectura = $datos->mostrarDatos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Proveedores</title>
</head>

<body style="background: #fffbd3;">
    <center>
        <h1>Proveedores</h1>
    </center>
    <table class="table" style="background: #E1efc6;">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Ubicacion</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            while ($registro = mysqli_fetch_array($lectura)) {
            ?>
            <tr>
                <td><?php echo $registro["Nombre"]; ?></td>
                <td><?php echo $registro["Telefono"]; ?></td>
                <td><?php echo $registro["Descripcion"]; ?></td>
                <td><?php echo $registro["Ubicacion"]; ?></td>               
            </tr>

        </tbody>
        <?php
            }
    ?>
    </table>
    <center> <a href="ActualizarEliminar.php" class="btn btn-danger btn-lg " tabindex="-1" role="button" aria-disabled="true">Actualizar</a>
    </center>
</body>

</html>