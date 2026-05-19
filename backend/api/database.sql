DROP DATABASE IF EXISTS agenda_app;

CREATE DATABASE agenda_app;

USE agenda_app;

-- =========================
-- TABLA USUARIOS
-- =========================

CREATE TABLE usuarios (

    id INT PRIMARY KEY AUTO_INCREMENT,

    nombre_de_usuario VARCHAR(50) UNIQUE,

    password VARCHAR(255),

    foto VARCHAR(255),

    token VARCHAR(255),

    token_expiracion DATETIME,

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================
-- TABLA CONTACTOS
-- =========================

CREATE TABLE contactos (

    id INT PRIMARY KEY AUTO_INCREMENT,

    usuario_id INT,

    nombre VARCHAR(100),

    apellido VARCHAR(100),

    telefono VARCHAR(20),

    email VARCHAR(120),

    direccion VARCHAR(255),

    notas TEXT,

    foto VARCHAR(255),

    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id)
    REFERENCES usuarios(id)
    ON DELETE CASCADE

);

-- =========================
-- USUARIO DE PRUEBA
-- =========================

INSERT INTO usuarios (

    nombre_de_usuario,
    password

)

VALUES (

    'admin',

    '$2y$10$9L5T0A7YjW5M6A7QwJwS1e7y6l0X9W9zj6m7kV0uP3aT9gY8HfK1S'

);

-- contraseña:
-- 123456