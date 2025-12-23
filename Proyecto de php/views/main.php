<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/welcome.css" />
  </head>
  <body>
    <div class="welcome-container">
      <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h1>
      <p>Has iniciado sesión correctamente. Explora, descubre y disfruta de cada momento.</p>
      <br>
      <a href="../logout.php" style="color: white; text-decoration: none; font-weight: bold;">Cerrar Sesión</a>
    </div>
  </body>
</html>