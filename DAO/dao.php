<?php

class DAO
{

    // POR EL MOMENTO HAGO LA CONEXION DE BD DE ESTA MANERA YA QUE AUN NO ENCUENTRO LA 
    // MANERA DE HACER LA IMPORTACION DE LA BASE DE DATOS DESDE UNA CARPETA A TRAVES DE UNA function
    private $servidor = "localhost";
    private $nombreBD = "ferreteria";
    private $usuario = "root";
    private $contraseña = "";


    public function AgregarPersonal($Nombre, $ApellidoP, $ApellidoM, $Fecha, $Telefono, $PuestoEmpleado, $Sueldo)
    {

        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $producto = "INSERT INTO empleados(Nombre, ApellidoP, ApellidoM, FechaNac, Telefono, PuestoEmpleado, Sueldo 
        ) VALUES('$Nombre', '$ApellidoP', '$ApellidoM', '$Fecha', '$Telefono', '$PuestoEmpleado', '$Sueldo')";

        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            header("Location: http://localhost/Sistema-Ferreteria-Marly/vista/exito.php");
        }
    }

    public function Eliminar()
    {
    }
}