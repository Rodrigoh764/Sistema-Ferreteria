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
        $producto = "INSERT INTO empleados(Nombre, ApellidoP, ApellidoM, FechaNac, Telefono, PuestoEmpleado, Sueldo) 
                    VALUES('$Nombre', '$ApellidoP', '$ApellidoM', '$Fecha', '$Telefono', '$PuestoEmpleado', '$Sueldo')";
        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            session_start();
            $_SESSION['exito'] = 'El registro fue guardado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/Login/inicio.php");
        }
    }

    public function ActualizarPersonal($id, $Nombre, $ApellidoP, $ApellidoM, $Fecha, $Telefono, $PuestoEmpleado, $Sueldo)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $producto = "UPDATE empleados SET Nombre = '$Nombre', ApellidoP = '$ApellidoP', ApellidoM = '$ApellidoM', FechaNac = '$Fecha', Telefono = '$Telefono', PuestoEmpleado = '$PuestoEmpleado', Sueldo = '$Sueldo' where  ID_Empleado = '$id'";
        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            session_start();
            $_SESSION['exitoUpdate'] = 'El registro fue actualizado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/GestPersonal/vista/modificarPersonal.php");
        }
    }

    public function mostrarDatos()
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "SELECT ID_Empleado, Nombre, ApellidoP, ApellidoM, FechaNac, Telefono, PuestoEmpleado, Puesto, Sueldo FROM empleados INNER JOIN puestos 
                        ON empleados.PuestoEmpleado = puestos.ID_Puesto;";
        $_Lectura = mysqli_query($conexion, $_Leer_SQL);
        return $_Lectura;
    }

    public function eliminarEmpleado($id)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "DELETE FROM empleados WHERE ID_Empleado = '$id'";
        $resultado = mysqli_query($conexion, $_Leer_SQL);
        if ($resultado) {
            session_start();
            $_SESSION['exitoDelete'] = 'El trabajador fue eliminado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/GestPersonal/vista/modificarPersonal.php");
        } else {
            echo "error";
        }
    }
}
