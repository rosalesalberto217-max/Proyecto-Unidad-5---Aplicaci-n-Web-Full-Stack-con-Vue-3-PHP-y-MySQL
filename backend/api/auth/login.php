<?php

require_once '../config/cors.php';
require_once '../config/database.php';

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$usuario = $data['nombre_de_usuario'];

$password = $data['password'];

$sql = "SELECT * FROM usuarios
        WHERE nombre_de_usuario = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$usuario]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$user) {

    echo json_encode([
        "success" => false,
        "message" => "Usuario no encontrado"
    ]);

    exit;
}

if(!password_verify(
    $password,
    $user['password']
)) {

    echo json_encode([
        "success" => false,
        "message" => "Contraseña incorrecta"
    ]);

    exit;
}

$token = bin2hex(random_bytes(32));

$expira = date(
    'Y-m-d H:i:s',
    strtotime('+7 days')
);

$update = $pdo->prepare(
    "UPDATE usuarios
    SET token = ?,
        token_expiracion = ?
    WHERE id = ?"
);

$update->execute([
    $token,
    $expira,
    $user['id']
]);

echo json_encode([
    "success" => true,
    "token" => $token,

    "usuario" => [

        "id" => $user['id'],

        "nombre_de_usuario" =>
            $user['nombre_de_usuario'],

        "foto" => $user['foto']
    ]
]);