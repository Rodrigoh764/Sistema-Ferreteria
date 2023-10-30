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
	<title>Document</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
	<?php include "../Nav.php"; ?>

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
		<?php
		$sql = "select * from ventas";
		$result = mysqli_query($conexion, $sql);
		while ($mostrar = mysqli_fetch_array($result)) {
		?>
			<tr>
				<td><?php echo $mostrar['ID_Venta'] ?></td>
				<td><?php echo $mostrar['Cliente'] ?></td>
				<td><?php echo $mostrar['Producto'] ?></td>
				<td><?php echo $mostrar['Cantidad'] ?></td>
				<td><?php echo $mostrar['Fecha'] ?></td>
			</tr>
		<?php
		}
		?>
	</table>
</center>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>