<?php

require_once __DIR__ . '/../config/cors.php';
require_once __DIR__ . '/../config/auth.php';

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$id = $data['id'] ?? '';

$sql = "DELETE FROM contactos
        WHERE id = ?
        AND usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $id,
    $usuario['id']
]);

echo json_encode([
    "success" => true,
    "message" => "Contacto eliminado"
]);