<?php
include('config.php'); // Conexión a la base de datos
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de creación de post
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $image_url = $_POST['image_url'];
    $id_usuario = $_SESSION['user_id'];

    // Insertar en la base de datos
    $stmt = $pdo->prepare("INSERT INTO Posts (titulo, contenido, id_usuario) VALUES (?, ?, ?)");
    $stmt->execute([$titulo, $contenido, $id_usuario]);

    echo "Publicación creada con éxito.";
}
?>

<form action="crear_post.php" method="POST">
    <label>Título:</label>
    <input type="text" name="titulo" required><br>

    <label>Contenido:</label>
    <textarea name="contenido" required></textarea><br>

    <label>URL de la imagen:</label>
    <input type="text" name="image_url"><br>

    <button type="submit">Publicar</button>
</form>