<?php
session_start();
include '../DAO/Dao.php';
$datos = new DAO();
$conexion = $datos->mostrarProductos();
$resultado = $conexion->query("SELECT * FROM ventas WHERE TotalVenta > 0");

// Verificar si se envió el formulario de búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST["folio"];
    $fecha = $_POST["fecha"];
    $tipo_nota = $_POST["tipo_nota"];
    $consulta_base = "SELECT * FROM ventas WHERE 1=1";

    if (!empty($folio)) {
        $consulta_base .= " AND Folio = '$folio'";
    }
    if (!empty($fecha)) {
        $consulta_base .= " AND FechaVenta = '$fecha'";
    }
    if (!empty($tipo_nota)) {
        $consulta_base .= " AND TipoNota = '$tipo_nota'";
    }
    $resultado = $conexion->query($consulta_base);
    // Mostrar alerta si no hay ventas con el folio proporcionado
    if (!empty($folio) && $resultado->num_rows == 0) {
        $_SESSION['error'] = 'No se encontraron ventas con el folio proporcionado';
        header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/MostrarVentas.php");
        exit();
    }
    // Mostrar alerta si no hay ventas en la fecha proporcionada
    if (!empty($fecha) && $resultado->num_rows == 0) {
        $_SESSION['error'] = 'No se encontraron ventas con la fecha proporcionada';
        header("Location: http://localhost/Sistema-Ferreteria/GestVentas/Vistas/MostrarVentas.php");
        exit();
    }
} else {
    $resultado = $conexion->query("SELECT * FROM ventas");
}

?>

<head>
    <title>Ventas</title>
    <link rel="icon" href="../Assets/Img/LOGO.jpg">
    <link rel="stylesheet" href="../Assets/css/Productos1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: #e0e2e4;">
    <?php
    //Dependiendo el usuario muestra el nav con opciones
    if ($_SESSION['usuario'] == 'Administrador') {
        include "../navInd.php";
    }
    if ($_SESSION['usuario'] == 'Vendedor') {
        include "../../GestVentas/navIndVentas.php";
        include "../alertas.php";
    }
    ?>
    <h1 class="text-center">Ventas realizadas</h1>
    <hr>
    <center>
        <div class="container">
            <form method="post">
                <div class="input-group mb-1">
                    <div class="col">
                        <label for="folio">Folio:</label>
                        <input type="text" class="form-control" id="folio" name="folio">
                    </div>
                    <div class="col">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="col">
                        <label for="tipo_nota">Tipo de Nota:</label>
                        <select class="form-control" id="tipo_nota" name="tipo_nota">
                            <option value="">Todos</option>
                            <option value="Garantia">Nota de garantía</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php if ($resultado->num_rows > 0) { ?>
            <div class="table-responsive" style="width: 70%;">
                <table class="table table-dark table-sm table-striped table-hover table align-middle">
                    <thead class="text-center">
                        <th scope="col">Folio</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nota</th>
                        <th scope="col"></th>
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
                                    <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#verModalVentas<?php echo $mostrar['IDVenta']; ?>">
                                        <i class="fa-solid fa-eye"></i> Ver productos
                                    </button>
                                    <?php include "ModalProductosVenta.php"; ?>
                                </td>
                            <?php
                        } ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </center>
</body>