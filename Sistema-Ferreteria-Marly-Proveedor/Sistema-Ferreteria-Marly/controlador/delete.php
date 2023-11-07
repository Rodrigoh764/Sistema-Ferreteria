<?php

include("../DAO/dao.php");

session_start();
$id_Proveedor = $_SESSION['usuarioid'];

$eliminarProveedor = new DAO();

$eliminarProveedor->eliminarProveedor($id_Proveedor);

