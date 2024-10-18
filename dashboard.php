<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

echo "<h1>Bienvenido al Sistema</h1>";

if ($_SESSION['is_super_user']) {
    echo "<p>Eres un Super User. Puedes gestionar usuarios y ver auditorías.</p>";
    echo "<a href='usuarios.php'>Gestión de Usuarios</a><br>";
    echo "<a href='auditoria.php'>Ver Auditoría</a><br>";
}

echo "<a href='logout.php'>Cerrar Sesión</a>";
?>
