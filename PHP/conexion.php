<?php
// Datos de conexión
$servername = "localhost";
$username = "root";  // Usuario de MySQL
$password = "";  // Contraseña de MySQL (si no tienes contraseña, déjalo vacío)

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE mi_base_de_datos";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
