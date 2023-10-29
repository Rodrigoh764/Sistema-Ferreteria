<?php session_start(); ?>

<head>
    <title>Inventario de productos</title>
    <title>Agregar Productos: Administración</title>
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
    <?php include '../Nav.php' ?>
    <h1 class="text-center">Agregar producto nuevo</h1>
    <div class="container">
        <form action="../Controlador/Insertar.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-1">
                <span class="input-group-text">Nombre del producto</span>
                <input type="text" REQUIRED class="form-control" name="Nombre">
            </div>
            <div class="input-group mb-1">
                <label class="input-group-text" for="select-Categoria">Selecciona categoría</label>
                <select class="form-select text-center" name="Categoria">
                    <option selected value="Herramienta">Herramienta</option>
                    <option value="Herramientas eléctricas">Herramienta eléctrica</option>
                    <option value="Cerrajería">Cerrajería</option>
                    <option value="Pintura y Complementos">Pintura y Complementos</option>
                    <option value="Soldadura">Soldadura</option>
                    <option value="Material Eléctrico">Material Eléctrico</option>
                    <option value="Plomería">Plomería</option>
                    <option value="Ferretería">Ferretería</option>
                </select>
            </div>
            <div class="input-group mb-1">
                <label class="input-group-text" for="select-Marca">Selecciona la marca</label>
                <select class="form-select text-center" name="Marca">
                    <option selected value="TRUPER">TRUPER</option>
                    <option value="PRETUL">PRETUL</option>
                    <option value="FOSET">FOSET</option>
                    <option value="VOLTECK">VOLTECK</option>
                    <option value="FIERO">FIERO</option>
                    <option value="HERMEX">HERMEX</option>
                    <option value="MAKITA">MAKITA</option>
                    <option value="VERDE PLUS">VERDE PLUS</option>
                    <option value="GENERICO">GENERICO</option>
                    <option value="ROYER">ROYER</option>
                </select>
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text">Precio del producto</span>
                <span class="input-group-text">$</span>
                <input type="text" REQUIRED class="form-control" name="Precio">
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text">Stock producto</span>
                <input type="text" REQUIRED class="form-control" name="Stock">
                <label class="input-group-text" for="select-Medida">Unidad de medida</label>
                <select class="form-select text-center" name="Medicion">
                    <option selected value="pza">pza</option>
                    <option value="kg">Kg</option>
                    <option value="m">m</option>
                </select>
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text">¿Cuenta con garantía?</span>
                &ensp;&ensp;&ensp;&ensp;&ensp;
                <div class="form-check form-switch text-center">
                    <input class="form-check-input" type="checkbox" role="switch" name="Garantia" id="flexSwitchCheckDefault" value="off">
                </div>
            </div>
            <div class="input-group mb-1" id="mostrar" style="display:none">
                <span class="input-group-text">Dias garantía</span>
                <input min="1" max="60" type="number" name="DiasGarantia" class="form-control" style="width: 100px;">
            </div>
            <textarea REQUIRED class="form-control mb-1" cols="8" rows="3" name="Descripcion" placeholder="Descripción"></textarea>
            <input type="file" REQUIRED class="form-control mb-1" name="Imagen" accept="image/*">
            <center><button type="submit" class="btn btn-success text-center">Agregar producto</button></center>
            <br>
        </form>
    </div>
    <script src="../Assets/js/input.js"></script>
</body>