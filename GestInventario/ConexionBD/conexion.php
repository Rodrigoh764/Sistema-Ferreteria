<?php

function conectarBD()
{
    $servidor = "localhost";
    $nombreBD = "ferreteria";
    $usuario = "root";
    $contraseña = "";
    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombreBD);
    return $conexion;
}