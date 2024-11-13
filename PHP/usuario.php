<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 'admin') {
    echo "Acceso denegado. Esta página es solo para usuarios normales.";
    exit();
}

// Contenido de la página para usuarios normales
echo "Bienvenido, " . $_SESSION['nombre'];
?>
