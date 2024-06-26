<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();

// Verificar si se ha enviado el formulario para agregar productos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST["producto_id"];
    $stock = $_POST["stock"];
    $cantidad = $_POST["Cantidad"];
    // Valida la cantidad
    if ($cantidad <= 0) {
        session_start();
        $_SESSION['error'] = 'La cantidad debe ser mayor o igual a 1';
        header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
        exit();
    }
    // Valida stock
    if ($stock >= $cantidad) {
        if (!isset($_SESSION["venta"])) {            
            $_SESSION["venta"] = array();
        }
        if (isset($_SESSION["venta"][$producto_id])) {
            $_SESSION["venta"][$producto_id] += $cantidad;
            // Verificar nuevamente si la nueva cantidad supera el stock
            if ($_SESSION["venta"][$producto_id] >= $stock) {
                session_start();
                $_SESSION['error'] = 'El stock no es suficiente';
                header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
                // Restaura la cantidad anterior
                $_SESSION["venta"][$producto_id] -= $cantidad;
                exit();
            }
        } else {
            $_SESSION["venta"][$producto_id] = $cantidad;
        }
    } else {
        session_start();
        $_SESSION['error'] = 'El stock no es suficiente';
        header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
        exit();
    }
}
header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
exit();