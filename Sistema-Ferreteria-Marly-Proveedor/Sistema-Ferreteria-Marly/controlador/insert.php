<?php
include("../modelo/Proveedor.php");
include("../DAO/dao.php");

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$descripcion = $_POST["descripcion"];
$ubicacion =  $_POST["ubicacion"];


$dao = new DAO();

$proveedor = new Proveedor($nombre, $telefono, $descripcion, $ubicacion);

if ($proveedor->validaTelefono() == 1) {
        $dao->AgregarProveedor($nombre, $telefono, $descripcion, $ubicacion);
}else {
    session_start();
    $_SESSION['error'] = 'Verifique el telefono asignado';
    header("Location: http://localhost/Sistema-Ferreteria-Marly-Proveedor/Sistema-Ferreteria-Marly/vista/addPersonal.php");
}