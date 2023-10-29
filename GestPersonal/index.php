<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>inicio</title>
</head>

<body>
    <?php
    if (isset($_SESSION['exito'])) {
    ?>
    <script>
        Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?php echo $_SESSION['exito'];?>',
  showConfirmButton: false,
  timer: 1500
})
    // Swal.fire(
    //     'Exito!',
    //     '<?php echo $_SESSION['exito'];?>',
    //     'success'
    // )
    </script>
    <?php
        unset($_SESSION['exito']);
    }
    ?>

    <h1>PLANTILLA DE INICIO</h1>

    <a href="vista/addPersonal.php">Agregar personal</a>
    <br>
    <a href="vista/mostrarPersonal.php">Mostrar Personal</a>
    <br>
    <a href="vista/ActualizarEliminar.php">Modificar y Eliminar</a>
</body>

</html>