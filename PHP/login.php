<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Buscar usuario
    $stmt = $pdo->prepare("SELECT * FROM Usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    $user = $stmt->fetch();

    if ($user && password_verify($contraseña, $user['contraseña'])) {
        $_SESSION['user_id'] = $user['id_usuario'];
        $_SESSION['role'] = $user['role']; // Asume que la tabla Usuarios tiene una columna de role
        header("Location: community.php");
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>

<form action="login.php" method="POST">
    <label>Correo:</label>
    <input type="email" name="correo" required><br>

    <label>Contraseña:</label>
    <input type="password" name="contraseña" required><br>

    <button type="submit">Iniciar sesión</button>
</form>