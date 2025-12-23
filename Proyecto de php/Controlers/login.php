<?php
session_start();
require_once 'conet_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['user']);
    $clave = trim($_POST['pass']);

    if (empty($nombre) || empty($clave)) {
        header("Location: Index.php");
        exit();
    }

    try {
        // 1. Buscar en la tabla Usuarios
        $stmt = $pdo->prepare("SELECT id, nombre FROM Usuarios WHERE nombre = ? AND pass = ?");
        $stmt->execute([$nombre, $clave]);
        $user = $stmt->fetch();

        if (!$user) {
            // 2. Si no está en Usuarios, buscar en Admins
            $stmt = $pdo->prepare("SELECT id, nombre FROM Admins WHERE nombre = ? AND pass = ?");
            $stmt->execute([$nombre, $clave]);
            $user = $stmt->fetch();
        }

        if ($user) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
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