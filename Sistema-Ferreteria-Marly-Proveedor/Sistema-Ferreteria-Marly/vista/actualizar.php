<?php

include("../DAO/dao.php");

$id = $_GET["id_proveedor"];

session_start();
$_SESSION['usuarioid']=$id;

$datos = new DAO();

$lectura = $datos->mostrarDatosIndividual($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Proveedores</title>
</head>

<body style="background: #fffbd3;">
    <center>
        <h1>Proveedores</h1>
    </center>
    <form action="../controlador/update.php" method="POST" enctype="multipart/form-data">
        <table class="table" style="background: #E1efc6;">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($registro = mysqli_fetch_array($lectura)) {
                ?>
                    <tr>
                        <td><input type="text" class="form-control" name="nombre" value="<?php echo $registro["Nombre"]; ?>"></td>
                        <td><input type="text" class="form-control" name="telefono" value="<?php echo $registro["Telefono"]; ?>"></td>
                        <td><input type="text" class="form-control" name="descripcion" value="<?php echo $registro["Descripcion"]; ?>"></td>
                        <td><input type="text" class="form-control" name="ubicacion" value="<?php echo $registro["Ubicacion"]; ?>"></td>
                        <td>
                           
                        <a class="btn btn-danger btn-lg " tabindex="-1" role="button" aria-disabled="true" id="btnEliminar" >Eliminar</a>

                        </td>
                    </tr>

            </tbody>
        <?php
                }
        ?>
        </table>
        <center>  <button type="submit" class="btn btn-primary" style="font-size: 1.5em">Actualizar</button>
        </center>
    </form>
    <script src="../js/mensaje.js"></script>
</body>

</html>