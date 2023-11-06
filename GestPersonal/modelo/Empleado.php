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

    public function validaTelefono()
    {
        $regex = '/(55)[ -]*([0-9][ -]*){8}$/';
        if (preg_match($regex, $this->telefono)) {
            $this->telefono = $this->telefono;
            return true;
        } else {
            return false;
        }
    }

    public function validaFechaNac()
    {
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date("Y-m-j");
        $años = strtotime('-18 year', strtotime($fechaActual));
        $nuevafecha = date('Y-m-j', $años);
        if ($nuevafecha >= $this->getFechaNac()) {
            return true;
        } else {
            return false;
        }
    }

    public function validaSueldo()
    {
        if ($this->getSueldo() > 0) {
            return true;
        } else {
            return false;
        }
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

    public function getSueldo()
    {
        return $this->sueldo;
    }
}
