<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Play&display=swap');

    a {
        font-family: 'Play', sans-serif;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#e94f08;">
    <div class="container-fluid">
        <a class="navbar-brand" href="../Login/inicio.php">Ferretería "Marley"</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Clientes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="">Consultar Clientes</a></li>
                        <li><a class="dropdown-item" href="#">Consultar Facturas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Personal
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../GestPersonal/vista/addPersonal.php">Agregar Personal</a></li>
                        <li><a class="dropdown-item" href="../GestPersonal/vista/mostrarPersonal.php">Consultar Personal</a></li>
                        <li><a class="dropdown-item" href="../GestPersonal/vista/modificarPersonal.php">Modificar Personal</a></li>
                        <li><a class="dropdown-item" href="#">Realizar Pago</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ventas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Consultar Ventas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Proveedores
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../GestProveedores/vista/addProveedor.php">Agregar Proveedor</a></li>
                        <li><a class="dropdown-item" href="../GestProveedores/vista/mostrarProveedores.php">Consultar Proveedor</a></li>
                        <li><a class="dropdown-item" href="#">Realizar pedido</a></li>
                        <li><a class="dropdown-item" href="#">Consultar pedidos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inventario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../GestInventario/Vista/AgregarProductos.php">Agregar Producto</a></li>
                        <li><a class="dropdown-item" href="../GestInventario/Vista/MostrarInventario.php">Consultar Inventario</a></li>
                        <li><a class="dropdown-item" href="../GestInventario/Vista/InventarioModificar.php">Modificar Producto</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        echo $_SESSION["usuario"];
                        ?> <i class="fa-solid fa-user fa-2xl"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="controlador/controlador_cerrar_sesion.php" id="cerrarSesion">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.getElementById("cerrarSesion").addEventListener("click", function(e) {
        e.preventDefault();
        Swal.fire({
            title: "¿Seguro que deseas cerrar sesión?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Cerrar sesión",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "controlador/controlador_cerrar_sesion.php";
            }
        });
    });
</script>