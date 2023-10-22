<?php session_start();



// $valor = $_GET['dato'];
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

    <!-- <?php
            if ($valor == 5) {
            ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'exito',
        text: 'Registro exitoso',
        footer: '<a href=""></a>'
    })
    </script>
    <?php
            }
    ?> -->

    <?php
    if (isset($_SESSION['exito'])) {
    ?>
    <script>
    Swal.fire(
        'Exito!',
        '<?php echo $_SESSION['exito'];?>',
        'success'
    )
    </script>
    <?php
        unset($_SESSION['exito']);
    }
    ?>




    <h1>PLANTILLA DE INICIO</h1>

    <!-- <?php echo $valor; ?> -->


    <a href="vista/addPersonal.php">Agregar personal</a>
    <br>
    <a href="vista/mostrarPersonal.php">Mostrar Personal</a>
    <br>
    <a href="vista/addPersonal.php">Modificar y Eliminar</a>
</body>

</html>