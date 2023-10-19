<?php

class Empleado extends Persona
{
    private $telefono;
    private $puesto;
    private $sueldo;

    public function __construct($nombre, $apellidoP, $apellidoM, $fechaNac, $telefono, $puesto, $sueldo)
    {
        parent::__construct($nombre, $apellidoP, $apellidoM, $fechaNac);
        $this->telefono = $telefono;
        $this->puesto = $puesto;
        $this->sueldo = $sueldo;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }
    public function getPuesto()
    {
        return $this->puesto;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }
    public function getSueldo()
    {
        return $this->sueldo;
    }
}
