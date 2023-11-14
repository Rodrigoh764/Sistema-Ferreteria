<?php session_start(); ?>

<head>
    <title>Agregar Personal: Administración</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: #e0e2e4;">
    <?php
    include("../navIndPersona.php");
    include("../alertas.php");
    ?>
    <h1 class="text-center">Agregar Personal</h1>
    <br>
    <div class="container">
        <!--    NOS DIRIGIMOS AL CONTROLADOR DONDE SE HARA LA COMUNICACION ENTRE EL CONTROLLER Y LA CLASE -->
        <form action="../controlador/insert.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-1">
                <span class="input-group-text">Nombre completo</span>
                <input type="text" REQUIRED class="form-control" name="nombre" placeholder="Nombre">
                <input type="text" REQUIRED class="form-control" name="apellidoP" placeholder="Apellido Paterno">
                <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno">
            </div>
            <div class="input-group mb-1">
                <div class="col">
                    <span class="input-group-text">Fecha de Nacimiento</span>
                    <input type="date" REQUIRED class="form-control" name="fecha">
                </div>
                <div class="col">
                    <span class="input-group-text">Teléfono</span>
                    <input type="number" REQUIRED class="form-control" name="telefono">
                </div>
            </div>
            <div class="input-group mb-1">
                <div class="col">
                    <span class="input-group-text">Puesto</span>
                    <select name="puesto" REQUIRED class="form-select" aria-label="Default select example">
                        <option></option>
                        <option value="2">Contador</option>
                        <option value="3">Vendedor</option>
                        <option value="4">Ayudante General</option>
                    </select>
                </div>
                <div class="col">
                    <label class="input-group-text">Sueldo</label>
                    <input type="number" REQUIRED id="sueldo" class="form-control" name="sueldo">
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-success text-center">Agregar trabajador</button>
                <button type="reset" class="btn btn-danger text-center">Restablecer</button>
            </center>
            <br>
        </form>
    </div>
</body>