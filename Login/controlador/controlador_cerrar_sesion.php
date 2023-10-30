<?php
session_start();
session_destroy();
header("location:http://localhost/Sistema-Ferreteria-Marly/Login/inicio.php");
exit();
?>