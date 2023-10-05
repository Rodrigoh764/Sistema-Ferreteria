<?php


function mostrarDatos()
{
    include("../BD/conexion.php");
    $conectar = conectarBD();



    $_Leer_SQL = "SELECT * FROM empleados";
    $_Lectura = mysqli_query($conectar, $_Leer_SQL);
    return $_Lectura;
}
