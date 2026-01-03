<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Nuevo Usuario - Optimized time</title>
    <link rel="stylesheet" href="styles/register.css" />
    <link rel="icon" href="assets/favicon.ico" type="image/ico">
</head>

<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form id="registroForm">
            <div class="form-group">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" required />
            </div>
            <div class="form-group">
                <label for="apellido">Apellido *</label>
                <input type="text" id="apellido" name="apellido" required />
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico *</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Contraseña *</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirmar Contraseña *</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required />
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" />
            </div>
            <button type="submit" class="btn" id="submitBtn">Registrarse</button>
        </form>
        <div id="mensajeExito" style="margin-top: 20px; font-weight: bold;"></div>
    </div>

    <script src="scripts/registro-validate.js"></script>
</body>

</html>