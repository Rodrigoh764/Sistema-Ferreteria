<?php
// echo "controlador";
include("../DAO/dao.php");

session_start();
$id_Empleado = $_SESSION['usuarioid'];

$eliminarPersonal = new DAO();

$eliminarPersonal->eliminarEmpleado($id_Empleado);

