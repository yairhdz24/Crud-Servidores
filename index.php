<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // Cambia esto si la base de datos no está en tu máquina local
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_basedatos";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>