<?php
$nombreServidor     = 'localhost';
$nombreUsuario      = 'root';
$clave              = '';
$nombreBaseDatos    = 'miProyectoPHP';

//Objeto de conexion
$con                = new mysqli($nombreServidor,$nombreUsuario,$clave,$nombreBaseDatos);

#Condiccion 
if ($con->connect_error) {
    die("Conexion fallida".$con->connect_error);
}
//echo "Conexion exitosa";
?>