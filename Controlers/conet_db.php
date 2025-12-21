<?php
$host = 'localhost';
$db   = 'pruebas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanzar excepciones en caso de error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devolver resultados como arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Usar sentencias preparadas reales
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Conexión exitosa a la base de datos.";
} catch (\PDOException $e) {
     // Puedes mostrar un mensaje de error o registrarlo
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
     // O simplemente: echo "Error de conexión: " . $e->getMessage();
}
?>
