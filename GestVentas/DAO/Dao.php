<?php

class DAO
{
    private $servidor = "localhost";
    private $nombreBD = "ferreteria";
    private $usuario = "root";
    private $contraseña = "";

    public function mostrarProductos()
    {
        //Solo regreso la conexion a la BD para usarla y mostrar los productos con ayuda del paginador
        $conexion = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->nombreBD);
        return $conexion;
    }
}
