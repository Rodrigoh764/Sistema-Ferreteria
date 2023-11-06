<?php
class Persona
{
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $fechaNac;

    public function __construct($nombre, $apellidoP, $apellidoM, $fechaNac)
    {
        $this->nombre = $nombre;
        $this->apellidoP = $apellidoP;
        $this->apellidoM = $apellidoM;
        $this->fechaNac = $fechaNac;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setApellidoP($apellidoP)
    {
        $this->apellidoP = $apellidoP;
    }

    public function getApellidoP()
    {
        return $this->apellidoP;
    }

    public function setApellidoM($apellidoM)
    {
        $this->apellidoM = $apellidoM;
    }

    public function getApellidoM()
    {
        return $this->apellidoM;
    }

    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }
}
