<?php
include '../DAO/Dao.php';
$datos = new DAO();
$lectura = $datos->mostrarProductos();
?>

<head>
    <title>Inventario de productos</title>
    <link rel="icon" href="Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
</head>

<body>
    <?php include '../Nav.php';
    $cantidad = mysqli_num_rows($lectura);
    ?>
    <h1 class="text-center">Inventario de productos</h1>
    <hr>
    <center>
        <div class="row text-center">
            <div class="col">
                <strong>Total de productos: <span> <?php echo $cantidad; ?> </span> </strong>
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
                while ($mostrar = mysqli_fetch_array($lectura)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $mostrar['Clave']; ?></td>
                        <td><?php echo $mostrar['Nombre']; ?></td>
                        <td><?php echo $mostrar['Categoria']; ?></td>
                        <td><?php echo $mostrar['Marca']; ?></td>
                        <td><?php echo $mostrar['Precio']; ?></td>
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
</body>