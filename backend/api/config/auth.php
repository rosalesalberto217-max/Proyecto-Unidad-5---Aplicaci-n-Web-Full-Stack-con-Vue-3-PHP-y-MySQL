<?php

require_once __DIR__ . '/database.php';

$headers = getallheaders();

if (!isset($headers['Authorization'])) {

    echo json_encode([
        "success" => false,
        "message" => "Token requerido"
    ]);

    exit;
}

$token = str_replace(
    'Bearer ',
    '',
    $headers['Authorization']
);

$sql = "SELECT * FROM usuarios
        WHERE token = ?
        AND token_expiracion > NOW()";

$stmt = $pdo->prepare($sql);

$stmt->execute([$token]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {

    echo json_encode([
        "success" => false,
        "message" => "Token inválido"
    ]);

    exit;
}