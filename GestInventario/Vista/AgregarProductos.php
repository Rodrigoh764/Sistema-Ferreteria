<?php session_start(); ?>

<head>
    <title>Agregar Productos: Administración</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: #e0e2e4;">
    <?php
    include "../navInd.php";
    include "../alertas.php";
    ?>
    <h1 class="text-center">Agregar producto nuevo</h1>
    <div class="container">
        <form action="../Controlador/Insertar.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-1">
                <span class="input-group-text">Nombre del producto</span>
                <input type="text" REQUIRED class="form-control" name="Nombre">
            </div>
            <div class="input-group mb-1">
                <div class="col">
                    <label class="input-group-text" for="select-Categoria">Selecciona categoría</label>
                    <select class="form-select text-center" name="Categoria">
                        <option selected value="Herramienta">Herramienta</option>
                        <option value="Herramienta eléctrica">Herramienta eléctrica</option>
                        <option value="Cerrajería">Cerrajería</option>
                        <option value="Pintura y Complementos">Pintura y Complementos</option>
                        <option value="Soldadura">Soldadura</option>
                        <option value="Material Eléctrico">Material Eléctrico</option>
                        <option value="Plomería">Plomería</option>
                        <option value="Ferretería">Ferretería</option>
                    </select>
                </div>
                <div class="col">
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
                <div class="col">
                    <span class="input-group-text">Precio del producto</span>
                    <input type="text" REQUIRED class="form-control" name="Precio">
                </div>
            </div>
            <div class="input-group mb-1">
                <div class="col">
                    <span class="input-group-text">Stock producto</span>
                    <input type="number" REQUIRED class="form-control" name="Stock">
                </div>
                <div class="col">
                    <label class="input-group-text" for="select-Medida">Unidad de medida</label>
                    <select class="form-select text-center" name="Medicion">
                        <option selected value="pza">Pieza</option>
                        <option value="kg">Kilogramo</option>
                        <option value="m">Metro</option>
                    </select>
                </div>
            </div>
            <div class="input-group mb-1">
                <div class="col">
                    <span class="input-group-text">¿Cuenta con garantía?</span>
                    <div class="form-check form-switch text-center" style="margin-left: 8rem;">
                        <input class="form-check-input" type="checkbox" role="switch" name="Garantia" id="flexSwitchCheckDefault" value="off">
                    </div>
                </div>
                <div class="col" id="mostrar" style="display:none">
                    <span class="input-group-text">Dias garantía</span>
                    <input min="1" max="10" type="number" name="DiasGarantia" class="form-control">
                </div>
                <div class="col">
                    <input type="file" REQUIRED class="form-control mb-1" name="Imagen" accept="image/*">
                </div>
            </div>
            <div class="input-group mb-1">
                <textarea REQUIRED class="form-control mb-1" cols="3" rows="2" name="Descripcion" placeholder="Descripción"></textarea>
            </div>
            <center>
                <button type="submit" class="btn btn-success text-center">Agregar producto</button>
                <button type="reset" class="btn btn-danger text-center">Restablecer</button>
            </center>
            <br>
        </form>
    </div>
    <script src="../Assets/js/input.js"></script>
</body>