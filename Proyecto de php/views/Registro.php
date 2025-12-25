<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Nuevo Usuario</title>
  <link rel="stylesheet" href="../styles/register.css" />
</head>
<body>
  <div class="container">
    <h2>Registro de Usuario</h2>
    <form id="registroForm">
      <!-- Nombre -->
      <div class="form-group">
        <label for="nombre">Nombre *</label>
        <input type="text" id="nombre" name="nombre" required />
        <div class="error" id="errorNombre"></div>
        <div class="success" id="successNombre"></div>
      </div>

      <!-- Apellido -->
      <div class="form-group">
        <label for="apellido">Apellido *</label>
        <input type="text" id="apellido" name="apellido" required />
        <div class="error" id="errorApellido"></div>
        <div class="success" id="successApellido"></div>
      </div>

      <!-- Correo -->
      <div class="form-group">
        <label for="email">Correo Electrónico *</label>
        <input type="email" id="email" name="email" required />
        <div class="error" id="errorEmail"></div>
        <div class="success" id="successEmail"></div>
      </div>

      <!-- Contraseña -->
      <div class="form-group">
        <label for="password">Contraseña *</label>
        <input type="password" id="password" name="password" required />
        <div class="error" id="errorPassword"></div>
        <div class="success" id="successPassword"></div>
      </div>

      <!-- Confirmar Contraseña -->
      <div class="form-group">
        <label for="confirmPassword">Confirmar Contraseña *</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required />
        <div class="error" id="errorConfirmPassword"></div>
        <div class="success" id="successConfirmPassword"></div>
      </div>

      <!-- Fecha de Nacimiento -->
      <div class="form-group">
        <label for="fechaNacimiento">Fecha de Nacimiento</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" />
        <div class="error" id="errorFecha"></div>
      </div>

      <!-- Botón de registro -->
      <button type="submit" class="btn" id="submitBtn">Registrarse</button>
    </form>

    <div class="message" id="mensajeExito">¡Usuario registrado con éxito!</div>
  </div>

  <script src="scripts/registro-validate.js"></script>
</body>
</html>