<?php session_start(); ?>

<head>
    <title>Agregar Proveedor: Administración</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: #e0e2e4;">
    <?php
    include("../navIndProveedor.php");
    include("../alertas.php");
    ?>
    <h1 class="text-center">Agregar Proveedor</h1>
    <br>
    <div class="container">
        <form action="../controlador/insert.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-1">
                <div class="col">
                    <span class="input-group-text">Nombre proveedor</span>
                    <input type="text" REQUIRED class="form-control" name="nombre">
                </div>
                <div class="col">
                    <span class="input-group-text">Teléfono</span>
                    <input type="number" REQUIRED class="form-control" name="telefono">
                </div>
            </div>
            <div class="input-group mb-1">
                <div class="col">
                    <textarea REQUIRED class="form-control mb-1" cols="3" rows="2" name="descripcion" placeholder="Descripción"></textarea>
                </div>
                <div class="col">
                    <textarea REQUIRED class="form-control mb-1" cols="3" rows="2" name="ubicacion" placeholder="Ubicación"></textarea>
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-success text-center">Agregar proveedor</button>
                <button type="reset" class="btn btn-danger text-center">Restablecer</button>
            </center>
            <br>
        </form>
    </div>
</body>