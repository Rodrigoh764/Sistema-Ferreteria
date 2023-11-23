<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();
?>

<head>
    <title>Modificar Productos</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <?php
    include "../navInd.php";
    include "../alertas.php";
    ?>
    <h1 class="text-center">Modificar Productos</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-dark table-sm table-striped table-hover table align-middle">
            <thead class="text-center">
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
                        <td class="text-center" scope="row"><?php echo $mostrar['Clave']; ?></td>
                        <td><?php echo $mostrar['Nombre']; ?></td>
                        <td class="text-center"><?php echo $mostrar['Categoria']; ?></td>
                        <td class="text-center"><?php echo $mostrar['Marca']; ?></td>
                        <td class="text-center">$<?php echo number_format($mostrar['Precio'], 2, '.', ''); ?></td>
                        <td class="text-center"><?php echo $mostrar['Stock']; ?></td>
                        <td hidden><?php echo $mostrar[6]; ?></td>
                        <td hidden><?php echo $mostrar['Garantia']; ?></td>
                        <td hidden><img src="data:image/png;base64,<?php echo base64_encode($mostrar['Imagen']); ?>"></td>
                        <td>
                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalModificar<?php echo $mostrar['Clave']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i> Modificar
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?php echo $mostrar['Clave']; ?>">
                                <i class="fa-solid fa-trash"></i> Eliminar
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