<?php
include("../DAO/dao.php");
$id = $_GET['idTrabajador'];
$eliminarPersonal = new DAO();
$eliminarPersonal->eliminarEmpleado($id);

