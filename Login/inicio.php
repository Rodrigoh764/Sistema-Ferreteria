<?php
session_start();
include "modelo/conexion.php";
include '../GestVentas/DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();
$fecha_actual = date("Y-m-d");
$resultado = $conexion->query("SELECT * FROM ventas WHERE FechaVenta = '$fecha_actual' ");
if (empty($_SESSION["usuario"])) {
	header("location:login.php");
}

//Paginador productos bajos
$registros = mysqli_query($conexion, "SELECT COUNT(*) as PRODUCTOS FROM productos WHERE Stock <= 20");
$resultadoRegistros = mysqli_fetch_array($registros);
$totalRegistrados = $resultadoRegistros['PRODUCTOS'];
$limite = 3;
if (empty($_GET['pagina'])) {
	$pagina = 1;
} else {
	$pagina = $_GET['pagina'];
}
$inicio = ($pagina - 1) * $limite;
$totalPaginas = ceil($totalRegistrados / $limite);
$stock_bajo = $conexion->query("SELECT Clave, Nombre, Stock FROM productos WHERE Stock <= 20 LIMIT $inicio,$limite");
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
	@import url('https://fonts.googleapis.com/css2?family=Play&display=swap');
	/* h1 */

	h2 {
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
	if ($_SESSION['usuario'] == 'Administrador') {
		include "../NavAdministrador.php";
	}
	if ($_SESSION['usuario'] == 'Vendedor') {
		include "../NavVendedor.php";
	}
	//include "../GestPersonal/alertas.php";
	include "../GestVentas/alertas.php";
	include "../Login/alertaLogin.php";
	?>
	<h2 class="text-center">Ventas del día de hoy</h2>
	<hr>
	<center>
		<div class="table-responsive" style="width: 70%;">
			<table class="table table-sm table-striped table-hover table align-middle" style="background-color: none; width: 70%;">
				<thead class="text-center">
					<th scope="col">Folio</th>
					<th scope="col">Nombre</th>
					<th scope="col">Fecha</th>
					<th scope="col">Nota</th>
					<th></th>
				</thead>
				<tbody class="text-center">
					<?php
					while ($mostrar = mysqli_fetch_array($resultado)) {
					?>
						<tr>
							<td hidden><?php echo $mostrar['IDVenta']; ?></td>
							<td scope="row"><?php echo $mostrar['Folio']; ?></td>
							<td>$<?php echo number_format($mostrar['TotalVenta'], 2, '.', ''); ?></td>
							<td><?php echo $mostrar['FechaVenta']; ?></td>
							<td><?php echo $mostrar['TipoNota']; ?></td>
							<td>
								<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#verModalVentas<?php echo $mostrar['IDVenta']; ?>">
									<i class="fa-solid fa-eye"></i> Ver productos
								</button>
								<?php include "../GestVentas/Vistas/ModalProductosVenta.php"; ?>
							</td>
						<?php
					} ?>
						</tr>
				</tbody>
			</table>
			<hr>
			<h2 class="text-center">Productos con stock bajo</h2>
			<hr>
			<table class="table table-sm table-striped table-hover table align-middle" style="background-color: none; width: 70%;">
				<thead class="text-center">
					<th scope="col">Clave</th>
					<th scope="col">Nombre</th>
					<th scope="col">Stock</th>
				</thead>
				<tbody class="text-center">
					<?php
					while ($mostrar = mysqli_fetch_array($stock_bajo)) {
					?>
						<tr>
							<td><?php echo $mostrar['Clave']; ?></td>
							<td scope="row"><?php echo $mostrar['Nombre']; ?></td>
							<td><?php echo $mostrar['Stock']; ?></td>
						<?php
					} ?>
						</tr>
				</tbody>
			</table>
		</div>

		<nav aria-label="Page navigation example">
			<ul class="pagination pagination-sm justify-content-center">
				<?php if ($pagina != 1) { ?>
					<li class="page-item <?php echo $_GET['pagina'] <= 0 ? 'disabled' : '' ?>">
						<a class='page-link' href="?pagina=<?php echo $pagina - 1; ?>">Anterior</a>
					</li>
					<?php
				}
				for ($i = 1; $i <= $totalPaginas; $i++) {
					if ($i == $pagina) { ?>
						<li class="page-item active">
							<?php echo "<a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>"; ?>
						</li>
					<?php } else { ?>
						<li class="page-item">
							<?php echo "<a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>"; ?>
						</li>
					<?php }
				}
				if ($pagina != $totalPaginas) {
					?>
					<li class="page-item">
						<a class='page-link' href="?pagina=<?php echo $pagina + 1; ?>">Siguiente</a>
					</li>
				<?php
				}
				?>
			</ul>
		</nav>
	</center>


	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>