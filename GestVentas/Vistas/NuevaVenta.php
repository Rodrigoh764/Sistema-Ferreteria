<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();
$fecha_actual = date("d-m-Y");
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
        <form action="../Controlador/CrearVenta.php" method="POST" enctype="multipart/form-data">
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
                                        <div class="container" style="padding-left: 20%;">
                                            <h5>Requiere nota de garantía?</h5>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="TipoNota" id="NotaGarantia" value="Garantia">
                                                <label class="form-check-label" for="NotaGarantia">Nota de garantía</label>
                                            </div>
                                        </div>
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
                                                    } else { ?>
                                                        <input class="form-control text-center" name="total" value="$0.00" disabled>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container text-center">
                    <a href="../Controlador/CancelarVenta.php" class="btn btn-outline-danger">Cancelar venta</a>
                    <button type="submit" class="btn btn-outline-success text-center">Generar venta</button>
                </div>
            </div>
        </form>
    </div>
</body>