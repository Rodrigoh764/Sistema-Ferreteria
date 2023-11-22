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
    // Verificar si la cantidad no es negativa
    if ($cantidad <= 0) {
        session_start();
        $_SESSION['error'] = 'La cantidad debe ser mayor o igual a 1';
        header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
        exit();
    }
    if ($stock >= $cantidad) {
        if (!isset($_SESSION["venta"])) {            
            $_SESSION["venta"] = array();
        }
        if (isset($_SESSION["venta"][$producto_id])) {
            $numero_aleatorio = $_SESSION['numero_aleatorio'];
            $_SESSION["venta"][$producto_id] += $cantidad;
            // Verificar nuevamente si la nueva cantidad supera el stock disponible
            if ($_SESSION["venta"][$producto_id] > $stock_disponible) {
                session_start();
                $_SESSION['error'] = 'El stock no es suficiente';
                header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
                // Restaurar la cantidad anterior
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