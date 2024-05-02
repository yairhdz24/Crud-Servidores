<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_port = "3307";
$db_user = "root";
$db_pass = "yairhdz24";
$db_name = "Servidores";
try {
    $con = new PDO('mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_name, $db_user, $db_pass);
    echo 'conectado correctamente ' ;
} catch (Exception $e) {
    echo 'No se pudo conectar a la base de datos : ' . $e->getMessage();
}
?>