<?php
session_start();

if (isset($_SESSION["venta"])) {
    unset($_SESSION["venta"]);
    session_start();
    $_SESSION['exitoDelete'] = 'Venta cancelada';
    header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
} else {
    header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/NuevaVenta.php");
}
