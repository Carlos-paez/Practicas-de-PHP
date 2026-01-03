<?php

    /*$host = "localhost";
    $user = "root";
    $password = ""; 
    $database = "pruebas";

    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $user, $password, $options);

    $insertQuery = "INSERT INTO usuarios (nombre, apellido, email, fecha_nacimiento, user_level, pass) VALUES (:nombre, :apellido, :email, :fecha_nacimiento, :user_level, :pass)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute(['nombre' => 'Carlos', 'apellido' => 'Páez', 'email' => 'carlospaezguerra@gmail.com', 'fecha_nacimiento' => '2006-06-30', 'user_level' => 'admin', 'pass' => '123']);

    $query = $pdo->query("SELECT * FROM usuarios");

    while ($row = $query->fetch()) {
        echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'];
    }*/


    $host = 'sql302.infinityfree.com';
    $db   = 'if0_40807261_pruebas';
    $user = 'if0_40807261';
    $pass = 'uRB8Fi8flP3';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        // No mostrar detalles al usuario
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Error de conexión a la base de datos.']);
        exit;
    }

    $query = $pdo->query("SELECT * FROM usuarios");

    while ($row = $query->fetch()) {
        echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'];
    }

?>