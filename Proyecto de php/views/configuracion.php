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
    <title>Configuración - Optimized time</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles/config.css" />
    <link rel="icon" href="assets/favicon.ico" type="image/ico">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">Optimized time</div>
            <ul class="nav-links">
                <li><a href="main.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="equipos.php"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="asignaciones.php"><i class="fas fa-user-tag"></i> Asignaciones</a></li>
                <li><a href="movimientos.php"><i class="fas fa-clipboard-list"></i> Movimientos</a></li>
                <li><a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
                <li><a href="configuracion.php" class="active"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1>Configuración del Sistema</h1>
                <div>
                    <a href="../index.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
            </div>

            <!-- Tabs -->
            <div class="config-tabs">
                <button class="tab-btn active" data-tab="empresa">Empresa</button>
                <button class="tab-btn" data-tab="catalogos">Catálogos</button>
                <button class="tab-btn" data-tab="seguridad">Seguridad</button>
                <button class="tab-btn" data-tab="backup">Copia de Seguridad</button>
            </div>

            <!-- Contenido: Empresa -->
            <div id="empresa" class="tab-content active">
                <h2>Datos de la Empresa</h2>
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre_empresa">Nombre de la Empresa</label>
                            <input type="text" id="nombre_empresa" name="nombre_empresa" value="Tecnologías XYZ S.A.">
                        </div>
                        <div class="form-group">
                            <label for="nit">NIT / RFC</label>
                            <input type="text" id="nit" name="nit" value="123456789-0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" value="Av. Siempre Viva 123, Ciudad">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" value="+52 55 1234 5678">
                        </div>
                        <div class="form-group">
                            <label for="email_contacto">Correo de Contacto</label>
                            <input type="email" id="email_contacto" name="email_contacto" value="soporte@empresa.com">
                        </div>
                    </div>
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar Datos</button>
                </form>
            </div>

            <!-- Contenido: Catálogos -->
            <div id="catalogos" class="tab-content">
                <h2>Catálogos del Sistema</h2>
                <p>Configura tipos de equipo, estados, roles y áreas permitidos en el inventario.</p>
                <br>
                <a href="catalogos/tipos_equipo.php" class="btn-save"
                    style="background:#3498db; text-decoration:none; display:inline-block; margin-right:10px;">
                    <i class="fas fa-laptop"></i> Tipos de Equipo
                </a>
                <a href="catalogos/estados.php" class="btn-save"
                    style="background:#3498db; text-decoration:none; display:inline-block; margin-right:10px;">
                    <i class="fas fa-sync-alt"></i> Estados de Equipo
                </a>
                <a href="catalogos/roles.php" class="btn-save"
                    style="background:#3498db; text-decoration:none; display:inline-block;">
                    <i class="fas fa-user-shield"></i> Roles de Usuario
                </a>
            </div>

            <!-- Contenido: Seguridad -->
            <div id="seguridad" class="tab-content">
                <h2>Políticas de Seguridad</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="inactividad">Minutos de inactividad para cerrar sesión</label>
                        <input type="number" id="inactividad" name="inactividad" value="30" min="5" max="120">
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="notificaciones" checked> Enviar notificaciones por correo al
                            asignar equipo
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="requerir_razon" checked> Requerir razón al dar de baja un
                            equipo
                        </label>
                    </div>
                    <button type="submit" class="btn-save"><i class="fas fa-lock"></i> Actualizar Seguridad</button>
                </form>
            </div>

            <!-- Contenido: Copia de Seguridad -->
            <div id="backup" class="tab-content">
                <h2>Copia de Seguridad</h2>
                <p>Realiza una copia de seguridad de la base de datos o agenda una automatización.</p>
                <div class="backup-section">
                    <h4>Acciones Disponibles</h4>
                    <a href="#" class="btn-backup"
                        onclick="alert('Función de respaldo programada en backend'); return false;">
                        <i class="fas fa-download"></i> Descargar Respaldo Ahora
                    </a>
                    <p style="margin-top:15px; font-size:0.9rem; color:#7f8c8d;">
                        Último respaldo: <strong>29 de Diciembre de 2025 - 18:45</strong>
                    </p>
                </div>
            </div>
        </main>
    </div>

    <script>
    // Funcionalidad de pestañas
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            // Quitar clase active de todos
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            // Agregar clase active al botón y contenido
            button.classList.add('active');
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
    </script>
</body>

</html>