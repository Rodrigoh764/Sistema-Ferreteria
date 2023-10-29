<?php
include '../DAO/Dao.php';

$id = $_GET['idProducto'];
$nombreProducto = $_POST['Nombre'];
$categoria = $_POST['Categoria'];
$marca = $_POST['Marca'];
$precio = $_POST['Precio'];
$stock = $_POST['Stock'];
$garantia = $_POST['Garantia'];
$descripcion = $_POST['Descripcion'];

$dao = new DAO();

if ($precio > 1) {
    if ($stock > 1) {
        $dao->actualizarProducto($id, $nombreProducto, $categoria, $marca, $precio, $stock, $descripcion, $garantia);
    } else {
        session_start();
        $_SESSION['error'] = 'Verifique el Stock del producto';
        header("Location: http://localhost/Sistema-Ferreteria/Vista/InventarioModificar.php");
    }
} else {
    session_start();
    $_SESSION['error'] = 'Verifique el Precio del producto';
    header("Location: http://localhost/Sistema-Ferreteria/Vista/InventarioModificar.php");
}

