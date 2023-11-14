<?php
include "modelo/conexion.php";
session_start();
if (empty($_SESSION["usuario"])) {
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login-Ferreteria-Marley</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Play&display=swap'); /* h1 */

	h1 {
		font-family: 'Play', sans-serif;
	}

	body {
		background-image: url("img/FondoIndex1.2.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;
		background-attachment: fixed;
	}
</style>

<body>
	<?php
	include "../Nav.php";
	include "../GestPersonal/alertas.php";
	include "../Login/alertaLogin.php";
	?>
	<center>
		<h1>Ventas del dia de hoy</h1>
		<table border="1">
			<tr>
				<td>ID_Venta</td>
				<td>Cliente</td>
				<td>Producto</td>
				<td>Cantidad</td>
				<td>Fecha</td>
			</tr>
		</table>
	</center>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>