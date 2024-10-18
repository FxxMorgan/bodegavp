<?php
session_start();
include 'config.php';

if (!$_SESSION['is_super_user']) {
    header('Location: dashboard.php');
    exit;
}

// Crear usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $is_super_user = isset($_POST['is_super_user']) ? 1 : 0;

    $stmt = $pdo->prepare('INSERT INTO usuarios (username, password, is_super_user) VALUES (?, ?, ?)');
    $stmt->execute([$username, $password, $is_super_user]);

    // Registrar en auditoría
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare('INSERT INTO auditoria (usuario_id, accion) VALUES (?, ?)');
    $stmt->execute([$user_id, "Creó al usuario $username"]);

    echo "Usuario creado exitosamente";
}

// Obtener todos los usuarios
$stmt = $pdo->query('SELECT * FROM usuarios');
$usuarios = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>

<h1>Gestión de Usuarios</h1>

<form method="POST">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="is_super_user">Super Usuario:</label>
    <input type="checkbox" id="is_super_user" name="is_super_user"><br>

    <button type="submit">Crear Usuario</button>
</form>

<h2>Lista de Usuarios</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Super User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['username'] ?></td>
            <td><?= $usuario['is_super_user'] ? 'Sí' : 'No' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="dashboard.php">Regresar</a>

</body>
</html>
