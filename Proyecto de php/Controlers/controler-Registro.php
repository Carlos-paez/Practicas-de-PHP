<?php
require_once 'conet_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre    = trim($_POST['nombre']);
    $apellido  = trim($_POST['apellido']);
    $email     = trim($_POST['email']);
    $pass      = $_POST['password'];
    $confirm   = $_POST['confirmPassword'];
    $fecha_nac = $_POST['fechaNacimiento'];
    
    
    $user_level = 'user';

    
    if (empty($nombre) || empty($apellido) || empty($email) || empty($pass)) {
        echo "Todos los campos obligatorios deben ser llenados.";
        exit();
    }

    if ($pass !== $confirm) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    try {
       
        $checkEmail = $pdo->prepare("SELECT id FROM Usuarios WHERE email = ?");
        $checkEmail->execute([$email]);
        
        if ($checkEmail->fetch()) {
            echo "El correo ya está registrado.";
            exit();
        }

        
        $sql = "INSERT INTO Usuarios (nombre, apellido, email, fecha_nacimiento, user_level, pass) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $apellido, $email, $fecha_nac, $user_level, $pass]);

        echo "success"; 

    } catch (PDOException $e) {
        echo "Error en el registro: " . $e->getMessage();
    }
}