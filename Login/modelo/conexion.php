<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$database = "ferreteria";

$conexion = new mysqli($servidor, $usuario, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>