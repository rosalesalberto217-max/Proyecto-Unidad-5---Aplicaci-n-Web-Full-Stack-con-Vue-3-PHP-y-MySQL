<?php

require_once '../config/cors.php';
require_once '../config/database.php';

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$usuario = htmlspecialchars(
    $data['nombre_de_usuario']
);

$password = password_hash(
    $data['password'],
    PASSWORD_DEFAULT
);

$sql = "INSERT INTO usuarios(
            nombre_de_usuario,
            password
        )
        VALUES(?, ?)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $usuario,
    $password
]);

echo json_encode([
    "success" => true,
    "message" => "Usuario registrado"
]);