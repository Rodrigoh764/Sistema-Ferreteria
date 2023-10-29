<?php
session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query(" select * from puestos where Puesto ='$usuario' and Contraseña='$password' ");
        if ($datos=$sql->fetch_object()) {
            echo("si entra a la condicional compro");
            #$_SESSION["id"] = $datos->id;
            $_SESSION["usuario"] = $datos->Puesto;
            header("location:inicio.php");
        }else{
            echo "<div class='alert alert-danger'> Acceso Denegado</div>";
        }
  } else {
        echo "Campos Vacios";
   }
}
