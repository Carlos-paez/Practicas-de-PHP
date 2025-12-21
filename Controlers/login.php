<?php
// En Controlers/login.php
require_once __DIR__ . '/../Controlers/conet_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['user'] ?? '';
    $password = $_POST['pass'] ?? '';

    if (!empty($usuario) && !empty($password)) {
        // Aquí iría tu consulta SQL real, por ahora simulamos éxito:
        // Ejemplo: SELECT * FROM usuarios WHERE user = :user
        
        header("Location: ../pages/main.php");

        echo "Intentando conectar con el usuario: " . htmlspecialchars($usuario);
        // Si todo es correcto, podrías usar: header("Location: ../Views/Dashboard.php");
    } else {
        echo "Por favor, llene todos los campos.";
    }
}
?>