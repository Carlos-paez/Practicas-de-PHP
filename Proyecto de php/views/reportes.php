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
    <title>Reportes - Optimized time</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles/reportes.css" />
    <link rel="icon" href="assets/favicon.ico" type="image/ico">
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">Optimized time</div>
            <ul class="nav-links">
                <li><a href="main.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="equipos.php"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="asignaciones.php"><i class="fas fa-user-tag"></i> Asignaciones</a></li>
                <li><a href="movimientos.php"><i class="fas fa-clipboard-list"></i> Movimientos</a></li>
                <li><a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="reportes.php" class="active"><i class="fas fa-chart-bar"></i> Reportes</a></li>
                <li><a href="configuracion.php"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="header">
                <h1>Reportes del Inventario</h1>
                <div>
                    <a href="../index.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
            </div>

            <div class="report-card">
                <h3>Reporte General de Equipos</h3>
                <p>Lista completa de todos los equipos registrados, con estado y asignación actual.</p>
                <a href="#" class="btn"><i class="fas fa-file-pdf"></i> Descargar PDF</a>
            </div>

            <div class="report-card">
                <h3>Equipos por Estado</h3>
                <p>Distribución de equipos por estado: Disponible, Asignado, En Mantenimiento, Dado de Baja.</p>
                <a href="#" class="btn"><i class="fas fa-chart-pie"></i> Ver Gráfico</a>
            </div>

            <div class="report-card">
                <h3>Historial de Movimientos (Últimos 30 días)</h3>
                <p>Registro detallado de todas las asignaciones, devoluciones y mantenimientos recientes.</p>
                <a href="#" class="btn"><i class="fas fa-file-excel"></i> Exportar a Excel</a>
            </div>
        </main>
    </div>
</body>

</html>