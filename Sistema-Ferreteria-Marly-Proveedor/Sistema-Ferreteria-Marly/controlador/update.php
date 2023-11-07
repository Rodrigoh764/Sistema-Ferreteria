<?php
session_start();

$id = $_SESSION['usuarioid'];

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$descripcion = $_POST["descripcion"];
$ubicacion =  $_POST["ubicacion"];

include("../DAO/dao.php");

$dao = new DAO();

$dao->ActualizarProveedor($id,$nombre, $telefono, $descripcion, $ubicacion);