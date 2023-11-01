<?php
include("../modelo/Persona.php");
include("../DAO/dao.php");
include("../modelo/Empleado.php");

$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$telefono =  $_POST["telefono"];
$fecha = $_POST["fecha"];
$puesto = $_POST["puesto"];
$sueldo = $_POST["sueldo"];

$dao = new DAO();

$empleado = new Empleado($nombre, $apellidoP, $apellidoM, $fecha, $telefono, $puesto, $sueldo);

if ($empleado->validaTelefono() == 1) {
    if ($empleado->validaFechaNac() == 1) {
        if ($empleado->validaSueldo() == 1) {
            
            $dao->AgregarPersonal($nombre, $apellidoP, $apellidoM, $fecha, $telefono, $puesto, $sueldo);
        } else {
            session_start();
            $_SESSION['error'] = 'Verifique el sueldo asignado';
            header("Location: http://localhost/Sistema-Ferreteria-Marly/vista/addPersonal.php");
        }
    } else {
        session_start();
        $_SESSION['error'] = 'Verifique la fecha asignada asignado';
        header("Location: http://localhost/Sistema-Ferreteria-Marly/vista/addPersonal.php");
    }
} else {
    session_start();
    $_SESSION['error'] = 'Verifique el telefono asignado';
    header("Location: http://localhost/Sistema-Ferreteria-Marly/vista/addPersonal.php");
}