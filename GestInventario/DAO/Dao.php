<?php

class DAO
{
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
            header("Location: http://localhost/Sistema-Ferreteria/Login/inicio.php");
        }
    }

    public function mostrarProductos()
    {
        //Solo regreso la conexion a la BD para usarla y mostrar los productos con ayuda del paginador
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        return $conexion;
    }

    public function actualizarProducto($id, $nombreProducto, $categoria, $marca, $precio, $stock, $descripcion, $garantia)
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $producto = "UPDATE productos SET Nombre = '$nombreProducto', Categoria = '$categoria', Marca = '$marca', Precio = '$precio', Stock = '$stock', Descripcion = '$descripcion', Garantia = '$garantia'
                WHERE Clave = '$id' ";
        $resultado = mysqli_query($conexion, $producto);
        if ($resultado) {
            session_start();
            $_SESSION['exitoUpdate'] = 'El producto fue actualizado de manera exitosa';
            header("Location: http://localhost/Sistema-Ferreteria/GestInventario/Vista/InventarioModificar.php");
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
            header("Location: http://localhost/Sistema-Ferreteria/GestInventario/Vista/InventarioModificar.php");
        }
    }

    /* public function buscarProducto()
    {
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        $_Leer_SQL = "SELECT * FROM productos WHERE Nombre LIKE '%" . $_GET['busqueda'] . "%' 
                      OR Clave LIKE '%" . $_GET['busqueda'] . "%' 
                      OR Precio LIKE '%" . $_GET['busqueda'] . "%'
                      OR Marca LIKE '%" . $_GET['busqueda'] . "%'
                      OR Categoria LIKE '%" . $_GET['busqueda'] . "%'";
        $resultado = mysqli_query($conexion, $_Leer_SQL);
        return $resultado;
    } */
}
