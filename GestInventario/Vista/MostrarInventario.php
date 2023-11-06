<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();
?>

<head>
    <title>Inventario de productos</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
</head>

<?php
//Paginador
$registros = mysqli_query($conexion, "SELECT COUNT(*) as PRODUCTOS FROM productos");
$resultadoRegistros = mysqli_fetch_array($registros);
$totalRegistrados = $resultadoRegistros['PRODUCTOS'];
$limite = 10;
if (empty($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}
$inicio = ($pagina - 1) * $limite;
$totalPaginas = ceil($totalRegistrados / $limite);
$resultado = $conexion->query("SELECT * FROM productos LIMIT $inicio,$limite");
?>

<body style="background-color: #e0e2e4;">
    <?php include "../navInd.php"; ?>
    <h1 class="text-center">Inventario de productos</h1>
    
    <center>
        <div class="row text-center">
            <div class="col">
                <strong>Total de productos: <span> <?php echo $totalRegistrados; ?> </span> </strong>
            </div>
        </div>
    </center>
    <div class="table-responsive">
        <table class="table table-dark table-sm table-striped table-hover table align-middle">
            <thead>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Marca</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                <?php
                while ($mostrar = mysqli_fetch_array($resultado)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $mostrar['Clave']; ?></td>
                        <td><?php echo $mostrar['Nombre']; ?></td>
                        <td><?php echo $mostrar['Categoria']; ?></td>
                        <td><?php echo $mostrar['Marca']; ?></td>
                        <td>$<?php echo $mostrar['Precio']; ?></td>
                        <td><?php echo $mostrar['Stock']; ?></td>
                        <td hidden><?php echo $mostrar[6]; ?></td>
                        <td hidden><?php echo $mostrar['Garantia']; ?></td>
                        <td hidden><img src="data:image/png;base64,<?php echo base64_encode($mostrar['Imagen']); ?>"></td>
                        <td>
                            <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#verModal<?php echo $mostrar['Clave']; ?>">
                                <i class="fa-solid fa-eye"></i> Ver producto
                            </button>
                        </td>
                        <?php include "ModalProducto.php"; ?>
                    <?php } ?>
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

</body>