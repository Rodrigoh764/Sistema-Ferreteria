<?php
include '../DAO/Dao.php';
$id = $_GET['idProducto'];
$dao = new DAO();
$dao->eliminarProducto($id);
