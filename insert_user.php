<?php
// Configuración de la conexión a la base de datos
$servername = "192.168.199.134";  // Cambia localhost por la dirección IP de tu servidor Debian
$username = "root";
$password = "yairhdz24";
$dbname = "Servidores";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}

// Verificar si todos los campos están presentes
if(isset($_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Imprimir los datos recibidos del formulario
    echo "Nombre: " . $nombre . "<br>";
    echo "Apellidos: " . $apellidos . "<br>";
    echo "Teléfono: " . $telefono . "<br>";
    echo "Email: " . $email . "<br>";

    // Preparar la consulta SQL para insertar datos
    $sql = "INSERT INTO users (nombre, apellidos, telefono, email) VALUES ('$nombre', '$apellidos', '$telefono', '$email')";

    // Imprimir la consulta SQL para depuración
    echo "Consulta SQL: " . $sql . "<br>";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
} else {
    echo "Todos los campos del formulario deben estar presentes.";
}

// Cerrar la conexión
$conn->close();
?>
