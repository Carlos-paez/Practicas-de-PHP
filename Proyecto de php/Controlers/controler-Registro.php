<?php
header('Content-Type: application/json');

include_once '../Models/Conet_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // De esta forma los datos se reciben en formato JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Los nombres en $_POST deben coincidir con el atributo 'name' del HTML
    $nombre     = trim($data['nombre'] ?? '');
    $apellido   = trim($data['apellido'] ?? '');
    $email      = trim($data['email'] ?? '');
    $pass       = $data['password'] ?? '';
    $confirm    = $data['confirmPassword'] ?? '';
    $fecha_nac  = !empty($data['fechaNacimiento']) ? $data['fechaNacimiento'] : null;
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