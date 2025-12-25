<?php
session_start();
require_once 'conet_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['user']);
    $clave = trim($_POST['pass']);

    if (empty($nombre) || empty($clave)) {
        header("Location: ../Index.php?error=emptyfields");
        exit();
    }

    try {
        $stmt = $pdo->prepare("SELECT id, nombre, user_level FROM Usuarios WHERE nombre = ? AND pass = ?");
        $stmt->execute([$nombre, $clave]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $_SESSION['user_level'] = $user['user_level']; 

            header("Location: ../Views/main.php");
            exit();
        } else {

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