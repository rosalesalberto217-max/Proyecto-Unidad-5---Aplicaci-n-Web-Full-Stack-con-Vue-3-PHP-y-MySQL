<?php

require_once __DIR__ . '/../config/cors.php';
require_once __DIR__ . '/../config/auth.php';

$id = $_POST['id'] ?? '';

$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$email = $_POST['email'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$notas = $_POST['notas'] ?? '';

$sql = "UPDATE contactos
        SET
            nombre = ?,
            apellido = ?,
            telefono = ?,
            email = ?,
            direccion = ?,
            notas = ?
        WHERE id = ?
        AND usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $nombre,
    $apellido,
    $telefono,
    $email,
    $direccion,
    $notas,
    $id,
    $usuario['id']
]);

echo json_encode([
    "success" => true,
    "message" => "Contacto actualizado"
]);