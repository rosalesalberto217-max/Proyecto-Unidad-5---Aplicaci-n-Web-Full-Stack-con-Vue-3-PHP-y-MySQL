<?php

require_once __DIR__ . '/../config/cors.php';
require_once __DIR__ . '/../config/auth.php';

$id = $_GET['id'] ?? '';

$sql = "SELECT * FROM contactos
        WHERE id = ?
        AND usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $id,
    $usuario['id']
]);

$contacto = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode([
    "success" => true,
    "contacto" => $contacto
]);