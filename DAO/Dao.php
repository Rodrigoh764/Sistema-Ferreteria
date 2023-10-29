<?php

class DAO
{
    //Conexion BD
    private $servidor = "localhost";
    private $nombreBD = "ferreteria";
    private $usuario = "root";
    private $contraseña = "";

    public function agregarProducto($nombreProducto, $categoria, $marca, $precio, $stock, $medida, $descripcion, $garantia, $imagen)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $producto = "INSERT INTO productos (Nombre, Categoria, Marca, Precio, Stock, Medida, Descripcion, Garantia, Imagen) 
        VALUES ('$nombreProducto','$categoria','$marca','$precio','$stock', '$medida', '$descripcion', '$garantia','$imagen')";
        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            session_start();
            $_SESSION['exito'] = 'El producto se registro de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/index.php");
        }
    }

    public function mostrarProductos()
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "SELECT * FROM productos";
        $_Lectura = mysqli_query($conexion, $_Leer_SQL);
        return $_Lectura;
    }

    

    /* public function mostrarProductoIndividual($claveProducto)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL =  "SELECT * FROM productos WHERE Clave = '$claveProducto'";
        $_Lectura = mysqli_query($conexion, $_Leer_SQL);
        return $_Lectura;
    } */

    public function actualizarProducto($id, $nombreProducto, $categoria, $marca, $precio, $stock, $descripcion, $garantia)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $producto = "UPDATE productos SET Nombre = '$nombreProducto', Categoria = '$categoria', Marca = '$marca', Precio = '$precio', Stock = '$stock', Descripcion = '$descripcion', Garantia = '$garantia'
                WHERE Clave = '$id' ";
        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            session_start();
            $_SESSION['exitoUpdate'] = 'El producto fue actualizado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/Vista/InventarioModificar.php");
        }
    }

    public function eliminarProducto($id)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "DELETE FROM productos WHERE Clave = '$id'";
        $resultado = mysqli_query($conexion, $_Leer_SQL);
        if ($resultado) {
            session_start();
            $_SESSION['exitoDelete'] = 'El producto fue eliminado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/Vista/InventarioModificar.php");
        }
    }
}
