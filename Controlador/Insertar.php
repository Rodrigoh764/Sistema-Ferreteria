<?php
include '../DAO/Dao.php';
include '../Modelo/Producto.php';

$nombreProducto = $_POST['Nombre'];
$categoria = $_POST['Categoria'];
$marca = $_POST['Marca'];
$precio = $_POST['Precio'];
$stock = $_POST['Stock'];
$medida =$_POST['Medicion'];
$descripcion = $_POST['Descripcion'];
$garantia = $_POST['DiasGarantia'];
$imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 

$dao = new DAO();

$producto = new Producto($nombreProducto, $categoria, $marca, $precio, $stock, $medida, $descripcion, $garantia);

if ($producto->validaPrecio() == 1) {
    if ($producto->validaStock() == 1) {
        $dao->agregarProducto($nombreProducto, $categoria, $marca, $precio, $stock, $medida, $descripcion, $garantia, $imagen);
    } else {
        session_start();
        $_SESSION['error'] = 'Verifique el Stock del producto';
        header("Location: http://localhost/Sistema-Ferreteria/Vista/AgregarProductos.php");
    }
} else {
    session_start();
    $_SESSION['error'] = 'Verifique el Precio del producto';
    header("Location: http://localhost/Sistema-Ferreteria/Vista/AgregarProductos.php");
}
