<?php
include("../modelo/Persona.php");
include("../DAO/dao.php");
include("../modelo/Empleado.php");

$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$telefono =  $_POST["telefono"];
$fecha = $_POST["fecha"];
$puesto = $_POST["puesto"];
$sueldo = $_POST["sueldo"];


$dao = new DAO();

$empleado = new Empleado($nombre, $apellidoP, $apellidoM, $fecha, $telefono, $puesto, $sueldo);

$dao->AgregarPersonal($nombre, $apellidoP, $apellidoM, $fecha, $telefono, $puesto, $sueldo);