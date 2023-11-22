<style>
    .row {
        width: 100%;
    }

    img {
        width: 200px;
        height: 200px;
    }

    .modal-header {
        padding: 0.3rem;
    }

    .modal-body {
        padding: 0.2rem;
    }

    .container1 {
        padding: 0.3rem 0rem 0rem 0.5rem;
    }
</style>

<?php
//Paginador
$registros = mysqli_query($conexion, "SELECT COUNT(*) as PRODUCTOS FROM productos");
$resultadoRegistros = mysqli_fetch_array($registros);
$totalRegistrados = $resultadoRegistros['PRODUCTOS'];

//$registrosCliente = mysqli_query($conexion, "SELECT COUNT(*) as CLIENTES FROM clientes");
//resultadoRegistrosCliente = mysqli_fetch_array($registrosCliente);
//$totalRegistradosCliente = $resultadoRegistrosCliente['CLIENTES'];

$limite = 7;
if (empty($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$inicio = ($pagina - 1) * $limite;
$totalPaginas = ceil($totalRegistrados / $limite);
$resultado = $conexion->query("SELECT * FROM productos LIMIT $inicio,$limite");

//$totalPaginasCliente = ceil($totalRegistradosCliente / $limite);
//$resultadoCliente = $conexion->query("SELECT * FROM clientes LIMIT $inicio,$limite");
?>

<!-- Modal productos -->
<div class="modal fade" id="verModal" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 1rem;">
                <h5 class="modal-title" id="verModalLabel">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 1rem;">
                <div id="modalContentContainer" class="table-responsive">
                    <table class="table table-dark table-sm table-striped table-hover table align-middle">
                        <thead class="text-center" style="background-color: #D2D2D2;">
                            <th scope="col">Clave</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Garantía</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php
                            while ($mostrar = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <form action="../Controlador/Añadir.php?idProducto=<?php echo $mostrar['Clave']; ?>" method="POST">
                                        <td scope="row"><?php echo $mostrar['Clave']; ?></td>
                                        <td><?php echo $mostrar['Nombre']; ?></td>
                                        <td class="text-center">$<?php echo $mostrar['Precio']; ?></td>
                                        <td class="text-center"><?php echo $mostrar['Garantia']; ?></td>
                                        <td>
                                            <center><input type="number" class="form-control" name="Cantidad" style="width: 5rem;"></center>
                                        </td>
                                        <td>
                                            <input type="hidden" name="producto_id" value="<?php echo $mostrar['Clave']; ?>">
                                            <input type="hidden" name="stock" value="<?php echo $mostrar['Stock']; ?>">
                                            <input type="submit" value="Seleccionar" class="btn btn-outline-warning btn-sm">
                                        </td>
                                    </form>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm justify-content-center" id="paginationContainer">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
