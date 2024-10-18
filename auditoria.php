<?php
session_start();
include 'config.php';

if (!$_SESSION['is_super_user']) {
    header('Location: dashboard.php');
    exit;
}

// Obtener todos los registros de auditoría
$stmt = $pdo->query('SELECT auditoria.*, usuarios.username FROM auditoria JOIN usuarios ON auditoria.usuario_id = usuarios.id');
$auditorias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoría</title>
</head>
<body>

<h1>Auditoría de Acciones</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Acción</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($auditorias as $auditoria): ?>
        <tr>
            <td><?= $auditoria['id'] ?></td>
            <td><?= $auditoria['username'] ?></td>
            <td><?= $auditoria['accion'] ?></td>
            <td><?= $auditoria['fecha'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="dashboard.php">Regresar</a>

</body>
</html>
