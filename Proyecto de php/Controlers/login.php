<?php
session_start();
require_once '../Models/conet_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['user']);
    $clave = trim($_POST['pass']);

    if (empty($nombre) || empty($clave)) {
        header("Location: ../Index.php?error=emptyfields");
        exit();
    }

    try {
        // MODIFICACIÓN: Solo seleccionar por nombre para obtener el hash
        $stmt = $pdo->prepare("SELECT id, nombre, pass, user_level FROM Usuarios WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // MODIFICACIÓN: Verificar la contraseña con el hash almacenado
            if (password_verify($clave, $user['pass'])) {

                $_SESSION['usuario_id'] = $user['id'];
                $_SESSION['usuario_nombre'] = $user['nombre'];
                $_SESSION['user_level'] = $user['user_level'];

                header("Location: ../Views/main.php");
                exit();
            } else {
                // Contraseña incorrecta
                header("Location: ../Index.php?error=invalidcredentials");
                exit();
            }
        } else {
            // Usuario no encontrado
            header("Location: ../Index.php?error=invalidcredentials");
            exit();
        }

    } catch (PDOException $e) {
        header("Location: ../Index.php?error=sqlerror");
        exit();
    }
} else {
    header("Location: ../Index.php");
    exit();
}