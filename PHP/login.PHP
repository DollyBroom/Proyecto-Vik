<?php
session_start();
require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Consulta para verificar el correo y obtener el rol del usuario
    $sql = "SELECT id_usuario, nombre, contraseña, rol FROM Usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verificación de la contraseña
        if (password_verify($contraseña, $user['contraseña'])) {
            // Guardar datos en la sesión
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            // Redireccionar según el rol
            if ($user['rol'] == 'admin') {
                header("Location: panel_admin.php");
            } else {
                header("Location: usuario_normal.php");
            }
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    $stmt->close();
    $conn->close();
}
?>