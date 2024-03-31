<?php
session_start();
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];
    // Eliminar el producto de la sesión "venta"
    if (isset($_SESSION["venta"][$producto_id])) {
        unset($_SESSION["venta"][$producto_id]);
    }
}
header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
exit();
?>
