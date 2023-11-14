<?php
session_start();
include("../DAO/dao.php");
$datos = new DAO();
$lectura = $datos->mostrarDatos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proveedores</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
</head>

<body style="background: #e0e2e4;">
    <?php
    include("../navIndProveedor.php");
    include("../alertas.php");
    ?>
    <h1 class="text-center">Proveedores</h1>
    <div class="table-responsive">
        <table class="table table-dark table-sm table-striped table-hover table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nombre Proveedor</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($registro = mysqli_fetch_array($lectura)) {
                ?>
                    <tr>
                        <td hidden><?php echo $registro["ID_Proveedor"]; ?></td>
                        <td><?php echo $registro["NombreEmpresa"]; ?></td>
                        <td><?php echo $registro["Telefono"]; ?></td>
                        <td><?php echo $registro["Descripcion"]; ?></td>
                        <td><?php echo $registro["Ubicacion"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliProve<?php echo $registro["ID_Proveedor"]; ?>">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </td>
                        <?php include "modalProveedor.php"; ?>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>