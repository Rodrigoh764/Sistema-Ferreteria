<?php


// function update()
// {
//     include("../BD/conexion.php");
//     $conectar = conectarBD();



//     $_Leer_SQL = "SELECT * FROM empleados";
//     $_Lectura = mysqli_query($conectar, $_Leer_SQL);
//     return $_Lectura;
// }


$id_empleado = $_GET["id_empleado"];

echo $id_empleado;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button id="boton">presion el boton</button>

</body>

</html>

<script src="../js/click.js"></script>