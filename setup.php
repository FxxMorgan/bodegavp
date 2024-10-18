<?php
// setup.php

require 'config.php'; // Archivo de conexión a la base de datos

// Verificar si ya existen usuarios en la base de datos
$query = $pdo->query("SELECT COUNT(*) FROM usuarios");
$userCount = $query->fetchColumn();

if ($userCount > 0) {
    // Redirigir al login si ya existen usuarios
    header("Location: login.php");
    exit();
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validar campos
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $errors[] = "Todos los campos son obligatorios.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    if (empty($errors)) {
        // Hashear la contraseña
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo super usuario en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password, is_super_user) VALUES (?, ?, ?)");
        $stmt->execute([$username, $passwordHash, true]);

        // Redirigir al login después de la creación
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Inicial - Crear Super Usuario</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Configuración Inicial</h1>
                <p class="text-center">Crea el primer super usuario para administrar el sistema.</p>

                <?php if ($errors): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="setup.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar contraseña:</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Crear Super Usuario</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
