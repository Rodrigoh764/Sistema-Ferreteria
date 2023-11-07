<?php
session_start();
?>

<body style="background: #887673">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../style/style.css">

</body>

<center>
    <h1>Agregar Proveedor</h1>
</center>

<?php

if (isset($_SESSION['error'])) {
?>
    <script> 
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $_SESSION['error']; ?>',
            footer: '<a href=""></a>'
        })
    </script>
<?php

    unset($_SESSION['error']);
}
?>

<div class="m-5 p-5 mt-0 pt-0 ">

    <!--    NOS DIRIGIMOS AL CONTROLADOR DONDE SE HARA LA COMUNICACION ENTRE EL CONTROLLER Y LA CLASE -->
    <form action="../controlador/insert.php" method="POST" enctype="multipart/form-data">

        <div class="mb-4 ">

            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>

        </div>

        <div class="mb-4">
            <label class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono" required>

        </div>
        <div class="mb-4">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" required>

        </div>

        <div class="mb-4">
            <labelclass="form-label">Ubicacion</labelclass=>
                <input type="text" class="form-control" name="ubicacion" required>

        </div>

        <button type="submit" class="btn btn-primary" style="font-size: 1.5em">Agregar</button>
        <button type="reset" class="btn btn-danger" style="font-size: 1.5em">Restablecer</button>


    </form>

</div>


</body>