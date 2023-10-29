<?php session_start(); ?>

<head>
    <title>Productos: Administración</title>
    <link rel="icon" href="Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="Assets/css/index1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['exito'])) {
    ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['exito']; ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
        unset($_SESSION['exito']);
    }
    ?>
    <?php include 'Nav.php' ?>
    <div class="row mx-5" style="padding-top: 10%;">
        <div class="col">
            <div class="card">
                <a href="Vista/AgregarProductos.php"><img src="Assets/Img/AgreProducto.png" class="card-img-top" alt="Agregar-Productos"></a>
                <div class="card-body">
                    <p class="card-text">Agregar producto</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a href="Vista/MostrarInventario.php"><img src="Assets/Img/Inventario.png" class="card-img-top" alt="Ver-Productos"></a>
                <div class="card-body">
                    <p class="card-text">Ver inventario</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a href="Vista/InventarioModificar.php"><img src="Assets/Img/ModificProd.png" class="card-img-top" alt="Modificar-Productos"></a>
                <div class="card-body">
                    <p class="card-text">Modificar productos</p>
                </div>
            </div>
        </div>
    </div>
</body>