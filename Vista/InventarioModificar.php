<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$lectura = $datos->mostrarProductos();
?>

<head>
    <title>Modificar Productos</title>
    <title>Inventario de productos</title>
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Alertas -->
    <?php
    if (isset($_SESSION['error'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $_SESSION['error']; ?>',
                footer: '<a href=""></a>'
            })
        </script>
    <?php
        unset($_SESSION['error']);
    }
    ?>
    <?php
    if (isset($_SESSION['exitoUpdate'])) {
    ?>
        <script>
            Swal.fire(
                'Éxito!',
                '<?php echo $_SESSION['exitoUpdate']; ?>',
                'success'
            )
        </script>
    <?php
        unset($_SESSION['exitoUpdate']);
    }
    ?>
    <?php
    if (isset($_SESSION['exitoDelete'])) {
    ?>
        <script>
            Swal.fire(
                'Éxito!',
                '<?php echo $_SESSION['exitoDelete']; ?>',
                'success'
            )
        </script>
    <?php
        unset($_SESSION['exitoDelete']);
    }
    ?>
    
    <?php include '../Nav.php'; ?>
    <h1 class="text-center">Modificar Productos</h1>
    <hr>
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
</body>