<?php
$db_host='localhost';
$db_usuario='root';
$db_password='';
$db_nombre='pagos';

//Configurando la conexion
$db = new mysqli($db_host, $db_usuario, $db_password, $db_nombre);
//Verifiando el estado de la conexion
if(mysqli_connect_errno()) {
    exit("Error al conectar con la BD.");
}
//Seleccionamos el set de caracteres
mysqli_set_charset($db, "utf8");
?>