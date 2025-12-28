<?php

    $host = "localhost";
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
    }
?>