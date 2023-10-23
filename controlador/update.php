<?php
session_start();

$id = $_SESSION['usuarioid'];

$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$telefono =  $_POST["telefono"];
$fecha = $_POST["fecha"];
$puesto = $_POST["puesto"];
$sueldo = $_POST["sueldo"];

include("../DAO/dao.php");

$dao = new DAO();

$dao->ActualizarPersonal($id,$nombre,$apellidoP,$apellidoM,$fecha,$telefono,$puesto,$sueldo);