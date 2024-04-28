<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "yairhdz24";
$dbname = "Servidores";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Comprobar si hay resultados y mostrarlos en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table id='userTable'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    // Agrega más encabezados según las columnas de tu tabla
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellidos"] . "</td>";
        // Agrega más columnas según las columnas de tu tabla
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
