<?php
session_start();
session_destroy();
header("location:http://localhost/Sistema-Ferreteria/Login/inicio.php");
exit();
?>