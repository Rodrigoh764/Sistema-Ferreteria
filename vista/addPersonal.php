<body style="background: #887673">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>


<center>
    <h1>Agregar Personal</h1>
</center>


<div class="m-5 p-5 mt-0 pt-0 ">
    <form action="../controlador/insert.php" method="POST" enctype="multipart/form-data">
        <div class="mb-4 ">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">

        </div>

        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellidoP">

        </div>
        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" name="apellidoM">

        </div>

        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">telefono</label>
            <input type="number" class="form-control" name="telefono">

        </div>

        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha">
        </div>

        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Puesto</label>

            <select name="puesto" class="form-select" aria-label="Default select example">
                <option selected>Selecciona una puesto</option>
                <option value="contador">Contador</option>
                <option value="vendedor">Vendedor</option>
                <option value="ayudante">Ayudante General</option>

            </select>


        </div>
        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Sueldo</label>
            <input type="text" class="form-control" name="sueldo">
        </div>

        <button type="submit" class="btn btn-primary" style="font-size: 1.5em">Agregar</button>

    </form>
</div>