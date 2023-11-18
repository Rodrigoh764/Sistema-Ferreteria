<?php
// session_start();
// ! Se quito para que pudiera salir alerta denegada, aparentemente no afecta 

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = $conexion->query(" select * from puestos where Puesto ='$usuario' and Contraseña='$password' ");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["usuario"] = $datos->Puesto;
            $_SESSION["inicioSesion"] = $datos->Puesto;
            header("location:inicio.php");
        } else {
            $_SESSION["inicioDenegado"] = 'Usuario o contraseña incorrectos';
            header("Location: http://localhost/Sistema-Ferreteria/Login/login.php");
        }
    } else {
        echo "Campos Vacios";
    }
}
