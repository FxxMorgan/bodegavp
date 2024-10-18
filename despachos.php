<?php
include 'config.php';

// Obtener todos los despachos
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $stmt = $pdo->query('SELECT despachos.*, clientes.nombre AS cliente, choferes.nombre AS chofer, destinos.nombre AS destino FROM despachos
                        JOIN clientes ON despachos.cliente_id = clientes.id
                        JOIN choferes ON despachos.chofer_id = choferes.id
                        JOIN destinos ON despachos.destino_id = destinos.id');
    $despachos = $stmt->fetchAll();
    echo json_encode($despachos);
}

// Crear un nuevo despacho
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $pdo->prepare('INSERT INTO despachos (nro_guia, cliente_id, chofer_id, destino_id, fecha, hora_salida, hora_llegada, observaciones)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$data['nro_guia'], $data['cliente_id'], $data['chofer_id'], $data['destino_id'], $data['fecha'], $data['hora_salida'], $data['hora_llegada'], $data['observaciones']]);
    echo json_encode(['message' => 'Despacho creado correctamente']);
}
?>
