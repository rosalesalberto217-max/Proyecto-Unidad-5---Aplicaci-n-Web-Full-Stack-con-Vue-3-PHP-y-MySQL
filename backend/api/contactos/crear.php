<?php

require_once __DIR__ . '/../config/cors.php';
require_once __DIR__ . '/../config/auth.php';

$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$email = $_POST['email'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$notas = $_POST['notas'] ?? '';

$foto = '';

if (isset($_FILES['foto'])) {

    $nombreArchivo =
        time() .
        '_' .
        $_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        __DIR__ . '/../uploads/contactos/' . $nombreArchivo
    );

    $foto =
        'http://localhost/backend/api/uploads/contactos/' .
        $nombreArchivo;
}

$sql = "INSERT INTO contactos(
            usuario_id,
            nombre,
            apellido,
            telefono,
            email,
            direccion,
            notas,
            foto
        )
        VALUES(
            ?,?,?,?,?,?,?,?
        )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $usuario['id'],
    $nombre,
    $apellido,
    $telefono,
    $email,
    $direccion,
    $notas,
    $foto
]);

echo json_encode([
    "success" => true,
    "message" => "Contacto creado"
]);