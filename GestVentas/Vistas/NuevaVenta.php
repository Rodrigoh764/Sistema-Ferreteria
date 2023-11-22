<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();
$fecha_actual = date("d-m-Y");
if (!isset($_SESSION['numero_aleatorio'])) {
    // Si no se ha asignado, generamos un nuevo número aleatorio en el rango de 1 a 100 y lo almacenamos en la sesión
    $_SESSION['numero_aleatorio'] = rand(1000, 10000);
}
$numero_aleatorio = $_SESSION['numero_aleatorio'];
?>

<head>
    <title>Venta nueva</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
</head>

<body style="background-color: #e0e2e4;">
    <?php
    //Dependiendo el usuario muestra el nav con opciones
    if ($_SESSION['usuario'] == 'Administrador') {
        include "../navInd.php";
    }
    if ($_SESSION['usuario'] == 'Vendedor') {
        include "../../GestVentas/navIndVentas.php";
        include "../alertas.php";
    }
    ?>
    <h1 class="text-center">Orden de compra</h1>
    <div class="content">
        <!-- <form action="../Controlador/NuevaVenta.php" method="POST" enctype="multipart/form-data"> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body" style="display: block;">
                                        <div style="display: flex">
                                            <h5>Datos del producto(s)</h5>
                                            <div style="width: 20px"></div>
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#verModal">
                                                <i class="fa fa-search"></i>
                                                Buscar producto
                                            </button>
                                            <?php include 'ModalVenta.php' ?>
                                        </div>
                                        <hr>
                                        <div class="row" style="font-size: 12px">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div id="modalContentContainer" class="table-responsive">
                                                        <table class="table table-sm table-striped table-hover table align-middle">
                                                            <thead class="text-center" style="background-color: #D2D2D2;">
                                                                <th scope="col">Clave</th>
                                                                <th scope="col">Descripción</th>
                                                                <th scope="col">Cantidad</th>
                                                                <th scope="col">Precio</th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Días de garantía</th>
                                                                <th scope="col"></th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (isset($_SESSION["venta"])) {
                                                                    $total = 0;
                                                                    foreach ($_SESSION["venta"] as $producto_id => $cantidad) {
                                                                        $consulta = "SELECT Clave, Nombre, Precio, Garantia FROM productos WHERE Clave = $producto_id";
                                                                        $resultado = $conexion->query($consulta);
                                                                        $producto = $resultado->fetch_assoc();
                                                                        $precio = $producto['Precio'];
                                                                        $garantia = $producto['Garantia'];
                                                                        $subTotalProducto = $precio * $cantidad;
                                                                        $total += $subTotalProducto;
                                                                ?>
                                                                        <tr>
                                                                            <td class="text-center"><?php echo $producto['Clave']; ?></td>
                                                                            <td><?php echo $producto['Nombre']; ?></td>
                                                                            <td class="text-center"><?php echo $cantidad ?></td>
                                                                            <td class="text-center">$<?php echo number_format($precio, 2, '.', ''); ?></td>
                                                                            <td class="text-center">$<?php echo number_format($subTotalProducto, 2, '.', ''); ?></td>
                                                                            <td class="text-center"><?php echo $garantia ?></td>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <a href="../Controlador/eliminar.php?id=<?php echo $producto_id; ?>" type="button" class="btn btn-outline-danger btn-sm">
                                                                                    <i class="fa-solid fa-trash"></i> Eliminar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="TipoNota" id="Nota" value="Nota">
                                                <label class="form-check-label" for="Nota">Nota</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="TipoNota" id="NotaGarantia" value="Garantia">
                                                <label class="form-check-label" for="NotaGarantia">Nota de garantía</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="TipoNota" id="SinNota" value="SinNota">
                                                <label class="form-check-label" for="SinNota">Sin nota</label>
                                            </div>
                                        </center>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h5 class="text-center">Detalle de la compra</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Folio</label>
                                                    <input class="form-control text-center" name="folio" value="<?php echo $numero_aleatorio; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fecha de la compra</label>
                                                    <input class="form-control text-center" name="fecha" value="<?php echo date("d-m-Y", strtotime($fecha_actual));  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Total de compra</label>
                                                    <?php
                                                    if (isset($_SESSION["venta"])) { ?>
                                                        <input class="form-control text-center" name="total" value="$<?php echo number_format($total, 2, '.', ''); ?>" disabled>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="form-group text-center">
                                                <!-- <input class="btn btn-outline-secondary" onclick="window.location='../Controlador/Insertar.php'" type="submit" value="Generar venta" name="btnVenta"> -->
                                                <!-- <button type="submit" class="btn btn-outline-secondary text-center">Generar venta</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../Assets/js/input.js"></script>
</body>