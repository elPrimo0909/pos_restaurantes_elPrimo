<?php
/*-------------------------
Autor: elprimo
---------------------------*/
# conectare la base de datos.
error_reporting(0);
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
define("DB_HOST", "127.0.0.1");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con4 = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
/*
mysqli_set_charset($con, "utf8"); 
$con->set_charset("utf8");  

if (@mysqli_connect_errno()) {
	die("Conexión falló: ".mysqli_connect_errno()." : ".mysqli_connect_error());
}*/
?>
