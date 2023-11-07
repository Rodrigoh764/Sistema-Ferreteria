<?php
Class DAO
{

    // POR EL MOMENTO HAGO LA CONEXION DE BD DE ESTA MANERA YA QUE AUN NO ENCUENTRO LA 
    // MANERA DE HACER LA IMPORTACION DE LA BASE DE DATOS DESDE UNA CARPETA A TRAVES DE UNA function
    private $servidor = "localhost";
    private $nombreBD = "ferreteria";
    private $usuario = "root";
    private $contraseña = "";


    public function AgregarProveedor($Nombre, $Telefono, $Descripcion, $Ubicacion)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $sql = "INSERT INTO proveedores(Nombre, Telefono, Descripcion, Ubicacion)
        VALUES('$Nombre', '$Telefono', '$Descripcion', '$Ubicacion')";

        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            session_start();
            $_SESSION['exito'] = 'El registro fue guardado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria-Marly-Proveedor/Sistema-Ferreteria-Marly/index.php");
        }
    }

    public function ActualizarProveedor($id,$Nombre, $Telefono, $Descripcion, $Ubicacion)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $sql = "UPDATE proveedores SET Nombre = '$Nombre', Telefono = '$Telefono', Descripcion = '$Descripcion', Ubicacion = '$Ubicacion' where  ID_Proveedor = '$id'";

        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            session_start();
            $_SESSION['exitoUpdate'] = 'El registro fue actualizado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria-Marly-Proveedor/Sistema-Ferreteria-Marly/vista/ActualizarEliminar.php");
        }
    }

    public function mostrarDatos()
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "SELECT * FROM proveedores";
        $_Lectura = mysqli_query($conexion, $_Leer_SQL);
        return $_Lectura;
    }


    public function mostrarDatosIndividual($id_Proveedor)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL =  "SELECT * FROM proveedores where ID_Proveedor = '$id_Proveedor'";
        $_Lectura = mysqli_query($conexion, $_Leer_SQL);
        return $_Lectura;
    }

    public function eliminarProveedor($id_Proveedor){
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "DELETE FROM proveedores WHERE ID_Proveedor = '$id_Proveedor'";
        $resultado = mysqli_query($conexion, $_Leer_SQL);
        if ($resultado) {
            header("Location:http://localhost/Sistema-Ferreteria-Marly-Proveedor/Sistema-Ferreteria-Marly/vista/ActualizarEliminar.php");
        }
    }


}
?>
