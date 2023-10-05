<?php

include("../BD/conexion.php");

$conectar = $conec;

$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$telefono =  $_POST["telefono"];
$fecha = $_POST["fecha"];
$puesto = $_POST["puesto"];
$sueldo = $_POST["sueldo"];




$producto = "INSERT INTO empleados(Nombre, ApellidoP, ApellidoM, FechaNac, Telefono, PuestoEmpleado, Sueldo 
) VALUES('$nombre', '$apellidoP', '$apellidoM', '$fecha', '$telefono', '$puesto', '$sueldo')";

$resultado = mysqli_query($conectar, $producto);

if ($resultado) {
    include("../vista/exito.php");
}