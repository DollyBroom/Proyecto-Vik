<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    echo "Acceso denegado. Solo los administradores pueden acceder a esta página.";
    exit();
}

// Contenido del panel de administración
echo "Bienvenido al panel de administración, " . $_SESSION['nombre'];
?>