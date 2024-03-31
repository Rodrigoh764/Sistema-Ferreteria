<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();

//Obtengo datos de venta
$folio = rand(1000, 10000);
$fecha_actual = date("d-m-Y");
$total = 0;

if (isset($_POST["TipoNota"])) {
    $tipoNota = $_POST["TipoNota"];
} else {
    $tipoNota = NULL;
}

//Inserta en tabla ventas
$venta = "INSERT INTO ventas (Folio , Cliente , TotalVenta, FechaVenta, TipoNota) 
        VALUES ('$folio', '1', '$total', CURRENT_TIMESTAMP-1, '$tipoNota')";
$resultado_venta = mysqli_query($conexion, $venta);

// Verificar si la inserción fue exitosa
if ($resultado_venta) {
    $id_venta = $conexion->insert_id;

    /// Recorrer los productos en la sesión y realizar la inserción en la tabla "productosventa"
    if (isset($_SESSION["venta"])) {
        foreach ($_SESSION["venta"] as $producto_id => $cantidad) {
            // Obtener información del producto
            $consulta_producto = "SELECT Precio FROM productos WHERE Clave = $producto_id";
            $resultado_producto = $conexion->query($consulta_producto);

            if ($resultado_producto->num_rows > 0) {
                $producto = $resultado_producto->fetch_assoc();
                $precio = $producto['Precio'];

                // Calcular el subtotal del producto
                $subtotal_producto = $precio * $cantidad;

                // Insertar detalle de la venta en la tabla "productosventa"
                $consulta_detalle = "INSERT INTO productosventa (NumVenta, ClaveProducto, Cantidad, Subtotal) VALUES ('$id_venta', '$producto_id', '$cantidad', '$subtotal_producto')";
                $conexion->query($consulta_detalle);

                // Actualizar el total de la venta
                $total += $subtotal_producto;
            }
        }
    }

    // Actualizar el total en la tabla "ventas"
    $consulta_actualizar_total = "UPDATE ventas SET TotalVenta = '$total' WHERE IDVenta = '$id_venta'";
    $conexion->query($consulta_actualizar_total);

    // Actualizar el stock de productos vendidos
    if (isset($_SESSION["venta"])) {
        foreach ($_SESSION["venta"] as $producto_id => $cantidad) {
            // Obtener el stock actual del producto
            $consulta_stock = "SELECT Stock FROM productos WHERE Clave = $producto_id";
            $resultado_stock = $conexion->query($consulta_stock);

            if ($resultado_stock) {
                $fila_stock = $resultado_stock->fetch_assoc();
                $stock_actual = $fila_stock["Stock"];

                // Calcular el nuevo stock
                $nuevo_stock = $stock_actual - $cantidad;

                // Actualizar el stock en la base de datos
                $consulta_actualizar_stock = "UPDATE productos SET Stock = $nuevo_stock WHERE Clave = $producto_id";
                $conexion->query($consulta_actualizar_stock);
            }
        }
    }

    unset($_SESSION["venta"]);

    session_start();
    $_SESSION['exito'] = 'Venta creada correctamete';
    header("Location: http://localhost/Sistema-Ferreteria/Login/inicio.php");
    exit();
} else {
    session_start();
    $_SESSION['error'] = 'Error al generar la venta';
    header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
    exit();
}
