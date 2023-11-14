<?php
include("../DAO/dao.php");
$id = $_GET['idProveedor'];
$eliminarProveedor = new DAO();
$eliminarProveedor->eliminarProveedor($id);