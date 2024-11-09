<?php
$servername = "localhost"; // O la dirección de tu servidor de base de datos
$username = "root"; // Usuario de tu base de datos
$password = ""; // Contraseña de tu base de datos (vacía si no tienes una)
$dbname = "Vik_database.sql"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}

// Cerrar la conexión
$conn->close();
?>
