<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-warning p-2 text-white text-center">CRUD EMPLEADOS!</h1>
    <br>
    <div class="container bg-light p-3 border border-dark">
        <a href="" class="btn btn-danger"> Agregar Empleado</a>
    </div>
    <br>
    <div class="container bg-light">
        <h1>Lista de Empleados</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col"> Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../modelo/conexion.php");

                $sql = "SELECT * FROM empleados";
                $query = mysqli_query($conexion, $sql);
                
                while($fila = mysqli_fetch_array($query) ){
                    ?>
                <tr>
                    <th scope="row"><?php echo $fila['ID_Empleado']?></th>
                    <th scope="row"><?php echo $fila['Nombre']?></th>
                    <th scope="row"><?php echo $fila['ApellidoP']?></th>
                    <th scope="row"><?php echo $fila['ApellidoM']?></th>
                    <th scope="row"><?php echo $fila['FechaNac']?></th>
                    <th scope="row"><?php echo $fila['Telefono']?></th>
                    <th scope="row"><?php echo $fila['PuestoEmpleado']?></th>
                    <th scope="row"><?php echo $fila['Sueldo']?></th>
                    <th scope="row">
                        <a href="" class="btn btn-warning">Editar</a>
                        <a href="" class="btn btn-danger">Eliminar</a>
                    </th>
                </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>