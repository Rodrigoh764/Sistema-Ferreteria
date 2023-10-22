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

    <title>Personal</title>
</head>

<body style="background: #fffbd3;">
    <center>
        <h1>Trabajadores</h1>
    </center>
    <table class="table" style="background: #E1efc6;">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Telefono</th>
                <th scope="col">Puesto Asignado</th>
                <th scope="col">Sueldo</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($registro = mysqli_fetch_array($lectura)) {
            ?>
            <tr>
                <td><?php echo $registro["Nombre"]; ?></td>
                <td><?php echo $registro["ApellidoP"]; ?></td>
                <td><?php echo $registro["ApellidoM"]; ?></td>
                <td><?php echo $registro["FechaNac"]; ?></td>
                <td><?php echo $registro["Telefono"]; ?></td>
                <td><?php echo $registro["PuestoEmpleado"]; ?></td>
                <td><?php echo $registro["Sueldo"]; ?></td>

                <td><a href="../controlador/update.php?id_empleado=<?php echo $registro["ID_Empleado"]; ?>"
                        class="btn btn-danger btn-lg " tabindex="-1" role="button" aria-disabled="true">Actualizar</a>
                </td>
            </tr>

        </tbody>
        <?php
            }
    ?>
    </table>
    <center> <a href="###" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Regresar</a>
    </center>
</body>

</html>