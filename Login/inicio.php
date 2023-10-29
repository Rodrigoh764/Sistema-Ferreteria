<?php
include "modelo/conexion.php";
session_start();
if(empty($_SESSION["usuario"])){
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
	<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		
		<div class="text-white bg-success p-2">
				<?php
				echo $_SESSION["usuario"];
				?>			
		</div>


		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Personal
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Agregar Personal</a>
						<a class="dropdown-item" href="#">Ver Personal</a>
						<a class="dropdown-item" href="#">Actualizar Personal</a>
					</div>
				</li>


				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Clientes
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Agregar Cliente</a>
						<a class="dropdown-item" href="#">Ver Clientes</a>
						<a class="dropdown-item" href="#">Actualizar Clientes</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Inventario
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Agregar Producto</a>
						<a class="dropdown-item" href="#">Ver Inventario</a>
						<a class="dropdown-item" href="#">Actualizar Productos</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Proveedores
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Agregar Proveedor</a>
						<a class="dropdown-item" href="#">Ver  Proveedores</a>
						<a class="dropdown-item" href="#">Actualizar  Proveedores</a>
					</div>
				</li>

					<a class="nav-item nav-link text-justify ml-3 hover-primary" href="controlador/controlador_cerrar_sesion.php">Salir</a>
			</div>
		</div>

	</nav>
	<div class="">
		<div class="jumbotron bg-dark text-light rounded-0">
			<h1 class="display-4">Ventas</h1>
		</div>
	</div>
	<table border ="1">
		<tr>
			<td>ID_Venta</td>
			<td>Cliente</td>
			<td>Producto</td>
			<td>Cantidad</td>
			<td>Fecha</td>
		</tr>
		<?php
		$sql="select * from ventas";
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result)){
			?>
			<tr>
			<td><?php echo $mostrar['ID_Venta']?></td>
			<td><?php echo $mostrar['Cliente']?></td>
			<td><?php echo $mostrar['Producto']?></td>
			<td><?php echo $mostrar['Cantidad']?></td>
			<td><?php echo $mostrar['Fecha']?></td>
		</tr>
		<?php
		}
		?>
	</table>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>