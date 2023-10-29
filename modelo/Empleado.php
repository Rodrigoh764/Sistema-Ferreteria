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

    public function validaDatos()
    {
    }

    // VALIDAMOS EL TELEFONO
    public function setTelefono()
    {
        $regex = '/(55)[ -]*([0-9][ -]*){8}$/';
        if (preg_match($regex, $this->telefono)) {
            echo 'El texto es válido';
            $this->telefono = $this->telefono;
        } else {
            echo 'El texto NO es válido';
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

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }
    public function getSueldo()
    {
        return $this->sueldo;
    }




    // function agregar()
    // {
    //     include("../DAO/dao.php");
    //     $dao = new DAO();
    //     $dao->AgregarPersonal($this->getNombre(), $this->getApellidoP(), $this->getApellidoP(), $this->getFechaNac(), $this->getTelefono(), $this->getPuesto(), $this->getSueldo());
    //     echo "verificando el nombre" . $this->getNombre();
    // }
}