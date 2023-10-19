<?php

class DAO
{
    // public function conectarBD()
    // {
    //     $servidor = "localhost";
    //     $nombreBD = "ferreteria";
    //     $usuario = "root";
    //     $contraseña = "";

    //     $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombreBD);
    //     return $conexion;
    // }

    public function AgregarPersonal($Nombre, $ApellidoP, $ApellidoM, $Fecha, $Telefono, $PuestoEmpleado, $Sueldo)
    {

        $servidor = "localhost";
        $nombreBD = "ferreteria";
        $usuario = "root";
        $contraseña = "";

        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombreBD);
        // $conexion = conectarBD();
        // $conectar = $conexion;

        $producto = "INSERT INTO empleados(Nombre, ApellidoP, ApellidoM, FechaNac, Telefono, PuestoEmpleado, Sueldo 
) VALUES('$Nombre', '$ApellidoP', '$ApellidoM', '$Fecha', '$Telefono', '$PuestoEmpleado', '$Sueldo')";

        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            echo "EXITO!!!!";
        }
    }
}