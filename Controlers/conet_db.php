<?php
$host = 'localhost';
$db   = 'pruebas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     // No imprimimos nada aquí para evitar errores de cabecera en redirecciones
} catch (\PDOException $e) {
     die("Error de conexión: " . $e->getMessage());
}
?>