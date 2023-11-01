<?php
session_start();
?>

<body style="background: #887673">
<?php

include ("../navIndPersona.php");
?>
<center>
    <h1>Agregar Personal</h1>
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

<div class="m-5 p-5 mt-0 pt-o ">

    <!--    NOS DIRIGIMOS AL CONTROLADOR DONDE SE HARA LA COMUNICACION ENTRE EL CONTROLLER Y LA CLASE -->
    <form action="../controlador/insert.php" method="POST" enctype="multipart/form-data">

        <div class="mb-4">

            <label class="form-label " >Nombre</label>
            <input type="text" class="form-control " name="nombre" required>
          

        </div>

        <div class="mb-4">
        <label class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellidoP" required>

        </div>
        <div class="mb-4">
            <label class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" name="apellidoM" required>

        </div>

        <div class="mb-4">
            <labelclass="form-label">telefono</labelclass=>
                <input type="number" class="form-control" name="telefono" required>

        </div>

        <div class="mb-4">
            <label class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Puesto</label>

            <select name="puesto" class="form-select" aria-label="Default select example" required>
                <option></option>
                <option value="contador">Contador</option>
                <option value="vendedor">Vendedor</option>
                <option value="ayudante">Ayudante General</option>

            </select>


        </div>
        <div class="mb-4">
            <label class="form-label">Sueldo</label>
            $<input type="text" id="sueldo" class="form-control" name="sueldo" required>
        </div>

        <button type="submit" class="btn btn-primary" style="font-size: 1.5em">Agregar</button>
        <button type="reset" class="btn btn-danger" style="font-size: 1.5em">Restablecer</button>


    </form>

</div>


</body>