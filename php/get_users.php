<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registros de Usuarios</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }
    h2 {
      margin-top: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      border: 2px solid #ddd;
      margin-bottom: 20px;
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #f5f5f5;
    }
    .acciones {
      display: flex;
      justify-content: space-between;
    }
    .acciones a {
      text-decoration: none;
      color: #333;
      padding: 5px 10px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .acciones a:hover {
      background-color: #f2f2f2;
    }
    .acciones a i {
      margin-right: 5px;
    }
  </style>
</head>
<body>

<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Si se ha enviado un ID de usuario para eliminar
if (isset($_GET['eliminar']) && !empty($_GET['eliminar'])) {
    // Obtener el ID de usuario a eliminar
    $id_usuario = $_GET['eliminar'];

    // Consulta SQL para eliminar el usuario con el ID proporcionado
    $sql_delete = "DELETE FROM users WHERE id = :id";

    // Preparar la consulta
    $stmt_delete = $con->prepare($sql_delete);

    // Enlazar parámetros
    $stmt_delete->bindParam(':id', $id_usuario, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($stmt_delete->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar usuario.";
    }
}

// Consulta SQL para seleccionar todos los registros de la tabla "users"
$sql = "SELECT * FROM users";

// Ejecutar la consulta
$stmt = $con->query($sql);

// Verificar si hay registros
if ($stmt->rowCount() > 0) {
    echo "<h2>Registros de Usuarios</h2>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Email</th><th>Acciones</th></tr>";
    // Iterar sobre los resultados y mostrarlos en la tabla
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellidos']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td class='acciones'><a href='#'><i class='fas fa-edit'></i> Editar</a> <a href='?eliminar=".$row['id']."'><i class='fas fa-trash-alt'></i> Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros de usuarios.";
}
?>

</body>
</html>
