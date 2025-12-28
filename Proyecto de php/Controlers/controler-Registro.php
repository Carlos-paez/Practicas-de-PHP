<?php
header('Content-Type: application/json');

include_once 'Conet_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Los nombres en $_POST deben coincidir con el atributo 'name' del HTML
    $nombre     = trim($_POST['nombre'] ?? '');
    $apellido   = trim($_POST['apellido'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $pass       = $_POST['password'] ?? '';
    $confirm    = $_POST['confirmPassword'] ?? '';
    $fecha_nac  = !empty($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
    $user_level = 'user';

    // 1. Validaciones básicas
    if (empty($nombre) || empty($apellido) || empty($email) || empty($pass)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos obligatorios deben ser llenados.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'El formato del correo electrónico no es válido.']);
        exit;
    }

    if ($pass !== $confirm) {
        echo json_encode(['status' => 'error', 'message' => 'Las contraseñas no coinciden.']);
        exit;
    }

    try {
        // 2. Verificar si el email ya existe
        $checkEmail = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $checkEmail->execute([$email]);
        if ($checkEmail->fetch()) {
            echo json_encode(['status' => 'error', 'message' => 'El correo ya está registrado.']);
            exit;
        }

        // 3. Encriptar contraseña
        $passHash = password_hash($pass, PASSWORD_DEFAULT);

        // 4. Insertar usuario
        $insertQuery = "INSERT INTO usuarios (nombre, apellido, email, fecha_nacimiento, user_level, pass) VALUES (:nombre, :apellido, :email, :fecha_nacimiento, :user_level, :pass)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute(['nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'fecha_nacimiento' => $fecha_nac, 'user_level' => $user_level, 'pass' => $passHash]);

        echo json_encode(['status' => 'success', 'message' => 'Usuario registrado con éxito.']);

    } catch (PDOException $e) {
        error_log("Error en la DB: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Error en el servidor al guardar datos.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}
?>