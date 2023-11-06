<?php
session_start();
include("../DAO/dao.php");
$datos = new DAO();
$lectura = $datos->mostrarDatos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modificar Personal</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
<link rel="stylesheet" href="../Assets/css/Productos1.css">
</head>

<body style="background: #e0e2e4;">
    <?php
    include("../navIndPersona.php");
    include("../alertas.php");
    ?>
    <h1 class="text-center">Modificar Trabajadores</h1>
    <div class="table-responsive">
        <table class="table table-dark table-sm table-striped table-hover table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Puesto Asignado</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($registro = mysqli_fetch_array($lectura)) {
                ?>
                    <tr>
                        <td hidden><?php echo $registro["ID_Empleado"]; ?></td>
                        <td><?php echo $registro["Nombre"]; ?></td>
                        <td><?php echo $registro["ApellidoP"]; ?></td>
                        <td><?php echo $registro["ApellidoM"]; ?></td>
                        <td><?php echo $registro["FechaNac"]; ?></td>
                        <td><?php echo $registro["Telefono"]; ?></td>
                        <td hidden><?php echo $registro["PuestoEmpleado"]; ?></td>
                        <td><?php echo $registro["Puesto"]; ?></td>
                        <td><?php echo $registro["Sueldo"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalModiTrab<?php echo $registro["ID_Empleado"]; ?>">
                                <i class="fa-solid fa-pen-to-square"></i> Modificar
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliTrab<?php echo $registro["ID_Empleado"]; ?>">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button> 
                        </td>
                        <?php include "modalTrabajador.php"; ?>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>