<?php
Class DAO
{
    private $servidor = "localhost";
    private $nombreBD = "ferreteria";
    private $usuario = "root";
    private $contraseña = "";

    public function AgregarProveedor($Nombre, $Telefono, $Descripcion, $Ubicacion)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $sql = "INSERT INTO proveedores(NombreEmpresa, Telefono, Descripcion, Ubicacion)
                VALUES('$Nombre', '$Telefono', '$Descripcion', '$Ubicacion')";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            session_start();
            $_SESSION['exito'] = 'El registro fue guardado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/Login/inicio.php");
        }
    }

    public function mostrarDatos()
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "SELECT * FROM proveedores";
        $_Lectura = mysqli_query($conexion, $_Leer_SQL);
        return $_Lectura;
    }

    public function eliminarProveedor($id){
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "DELETE FROM proveedores WHERE ID_Proveedor = '$id'";
        $resultado = mysqli_query($conexion, $_Leer_SQL);
        if ($resultado) {
            session_start();
            $_SESSION['exitoDelete'] = 'El proveedor fue eliminado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/GestProveedores/vista/mostrarProveedores.php");
        } else {
            echo "error";
        }
    }
}