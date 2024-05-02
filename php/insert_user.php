<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se han enviado datos del formulario
if (isset($_POST["nombre"], $_POST["apellidos"], $_POST["telefono"], $_POST["email"])) {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    try {
        // Preparar la consulta SQL para insertar datos
        $stmt = $con->prepare("INSERT INTO users (nombre, apellidos, telefono, email) VALUES (:nombre, :apellidos, :telefono, :email)");
        
        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar usuario.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No se han enviado datos del formulario.";
}
?>
