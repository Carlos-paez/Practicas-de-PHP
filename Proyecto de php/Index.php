<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimized time</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/read.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

    <div class="form-container" data-aos="zoom-in">
        <header class="baner">
            <nav>
                <ul style="list-style: none; display: flex; gap: 10px; justify-content: center; padding: 0;">
                    <li><a href="Index.php" style="color: white;">Inicio</a></li>
                    <li><a href="Views/Registro.php" style="color: white;">Registro</a></li>
                </ul>
            </nav>
        </header>

        <h1>Login</h1>

        <form action="Controlers/login.php" method="POST">
            <div class="form-group"data-aos="fade-right">
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="user" required>
            </div>

            <div class="form-group" data-aos="fade-right">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>
            </div>

            <div class="form-group" data-aos="fade-right">
                <input type="submit" value="Iniciar Sesión">
            </div>
        </form>


        <div class="modal" id="modal5">
          <div class="modal-inner">
              <h2>Si es su primera vez en ingresar o no cuneta con usuario propio</h2>
                <p>Dirigase a registro para crar un nuevo Usuario</p>
                  <button class="close-modal" data-close="modal5">Cerrar</button>
          </div>
        </div>

     <button id="open-modal5">Leer antes de entrar</button>
     <script> var open = document.getElementById('open-modal5');
     var modal5 = document.getElementById('modal5');
     var close = modal5.querySelector('[data-close=modal5]');
     open.addEventListener('click', ()=>modal5.classList.add('active'));
     close.addEventListener('click', ()=>modal5.classList.remove('active'));
     </script>
    </div>

    <?php if (isset($_GET['error'])): ?>
    <div style="background: #ff4d4d; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 14px; text-align: center;">
        <?php
            if ($_GET['error'] == "emptyfields") echo "Por favor, rellene todos los campos.";
            elseif ($_GET['error'] == "invalidcredentials") echo "Usuario o contraseña incorrectos.";
            elseif ($_GET['error'] == "sqlerror") echo "Error interno del servidor.";
        ?>
    </div>
<?php endif; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>



</body>
</html>
