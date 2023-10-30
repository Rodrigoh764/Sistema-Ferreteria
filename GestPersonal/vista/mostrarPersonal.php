<?php
 session_start();
include("../DAO/dao.php");

$datos = new DAO();

$lectura = $datos->mostrarDatos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Personal</title>
</head>

<body style="background: #fffbd3;">
<?php

include ("../navIndPersona.php");
?>
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
                <td>$<?php echo $registro["Sueldo"]; ?></td>

               
            </tr>

        </tbody>
        <?php
            }
    ?>
    </table>
   
</body>

</html>