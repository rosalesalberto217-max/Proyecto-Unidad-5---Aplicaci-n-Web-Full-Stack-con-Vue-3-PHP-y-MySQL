<?php

require_once __DIR__ . '/../config/cors.php';
require_once __DIR__ . '/../config/auth.php';

$sql = "SELECT * FROM contactos
        WHERE usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $usuario['id']
]);

$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "success" => true,
    "contactos" => $contactos
]);