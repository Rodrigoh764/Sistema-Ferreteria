<?php

include("../DAO/dao.php");

$id = $_GET["id_empleado"];

session_start();
$_SESSION['usuarioid']=$id;

$datos = new DAO();

$lectura = $datos->mostrarDatosIndividual($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Personal</title>
</head>

<body style="background: #fffbd3;">
<?php

include ("../navIndPersona.php");
?>
    <center>
        <h1>Trabajadores</h1>
    </center>
    <form action="../controlador/update.php" method="POST" enctype="multipart/form-data">
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
                        <td><input type="text" class="form-control" name="nombre" value="<?php echo $registro["Nombre"]; ?>"></td>
                        <td><input type="text" class="form-control" name="apellidoP" value="<?php echo $registro["ApellidoP"]; ?>"></td>
                        <td><input type="text" class="form-control" name="apellidoM" value="<?php echo $registro["ApellidoM"]; ?>"></td>
                        <td><input type="date" class="form-control" name="fecha" value="<?php echo $registro["FechaNac"]; ?>"></td>
                        <td><input type="number" class="form-control" name="telefono" value="<?php echo $registro["Telefono"]; ?>"></td>
                        <td> <select name="puesto" class="form-select" aria-label="Default select example" required>
                                <option><?php echo $registro["PuestoEmpleado"]; ?></option>
                                <option value="contador">Contador</option>
                                <option value="vendedor">Vendedor</option>
                                <option value="ayudante">Ayudante General</option>
                            </select></td>
                        <td><input type="text" class="form-control" name="sueldo" value="<?php echo $registro["Sueldo"]; ?>"></td>

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