<?php
class Proveedor
{
    private $nombre;
    private $telefono;
    private $descripcion;
    private $ubicacion;

    public function __construct($nombre, $telefono, $descripcion, $ubicacion)
    {
        $this->nombre = $nombre;
        $this->$telefono = $telefono;
        $this->$descripcion = $descripcion;
        $this->$ubicacion = $ubicacion;
    }

    public function validaTelefono()
    {
            return true;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }
    public function getUbicacion()
    {
        return $this->ubicacion;
    }
}
?>