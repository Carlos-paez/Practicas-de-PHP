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
    <title>Dashboard - Optimized time</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="icon" href="assets/favicon.ico" type="image/ico">

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">Optimized time</div>
            <ul class="nav-links">
                <li><a href="dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="equipos.php"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="asignaciones.php"><i class="fas fa-user-tag"></i> Asignaciones</a></li>
                <li><a href="movimientos.php"><i class="fas fa-clipboard-list"></i> Movimientos</a></li>
                <li><a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
                <li><a href="configuracion.php"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1>Dashboard - Optimized time</h1>
                <div class="user-info">
                    <span>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</span>
                    <a href="../index.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="card">
                    <h3>Total Equipos</h3>
                    <div class="value">124</div>
                    <div class="icon"><i class="fas fa-laptop"></i></div>
                </div>
                <div class="card">
                    <h3>Asignados</h3>
                    <div class="value">98</div>
                    <div class="icon"><i class="fas fa-user-check"></i></div>
                </div>
                <div class="card">
                    <h3>Disponibles</h3>
                    <div class="value">26</div>
                    <div class="icon"><i class="fas fa-box-open"></i></div>
                </div>
                <div class="card">
                    <h3>En Mantenimiento</h3>
                    <div class="value">5</div>
                    <div class="icon"><i class="fas fa-tools"></i></div>
                </div>
            </div>

            <!-- Quick Actions -->
            <section class="quick-actions">
                <h2>Acciones Rápidas</h2>
                <div class="action-buttons">
                    <a href="equipos.php?accion=nuevo" class="action-btn"><i class="fas fa-plus"></i> Nuevo Equipo</a>
                    <a href="asignaciones.php?accion=nueva" class="action-btn"><i class="fas fa-plus-circle"></i> Nueva
                        Asignación</a>
                    <a href="movimientos.php" class="action-btn"><i class="fas fa-history"></i> Ver Historial</a>
                    <a href="reportes.php" class="action-btn"><i class="fas fa-file-export"></i> Generar Reporte</a>
                </div>
            </section>
        </main>
    </div>
</body>

</html>