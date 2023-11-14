<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();

$resultado = $conexion->query("SELECT * FROM productos WHERE Nombre LIKE '%" . $_GET['busqueda'] . "%' 
                                OR Precio LIKE '%" . $_GET['busqueda'] . "%' 
                                OR Clave LIKE '%" . $_GET['busqueda'] . "%' 
                                OR Marca LIKE '%" . $_GET['busqueda'] . "%'
                                OR Categoria LIKE '%" . $_GET['busqueda'] . "%'");
?>

<head>
    <title>Busqueda productos</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
</head>

<body style="background-color: #e0e2e4;">
    <?php include "../navInd.php"; ?>
    <h1 class="text-center">Buscando resultados para: "<?php echo $_GET['busqueda']; ?>"</h1>
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
        <center>
            <a href="MostrarInventario.php" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i> Ver todos los productos</a>
        </center>
    </div>
</body>