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
    <title>Asignaciones - Optimized time</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles/Pages.css">
    <link rel="icon" href="assets/favicon.ico" type="image/ico">
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">Optimized time</div>
            <ul class="nav-links">
                <li><a href="main.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="equipos.php"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="asignaciones.php" class="active"><i class="fas fa-user-tag"></i> Asignaciones</a></li>
                <li><a href="movimientos.php"><i class="fas fa-clipboard-list"></i> Movimientos</a></li>
                <li><a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
                <li><a href="configuracion.php"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="header">
                <h1>Asignaciones de Equipos</h1>
                <div>
                    <a href="../index.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
            </div>

            <a href="asignaciones.php?accion=nueva" class="btn"><i class="fas fa-plus-circle"></i> Nueva Asignación</a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipo</th>
                        <th>Usuario</th>
                        <th>Fecha Asignación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ASG-001</td>
                        <td>Laptop Dell (EQ-001)</td>
                        <td>Juan Pérez</td>
                        <td>2025-03-15</td>
                        <td>Activo</td>
                        <td><a href="#">Ver</a> | <a href="#" style="color:#e74c3c;">Dar de Baja</a></td>
                    </tr>
                    <tr>
                        <td>ASG-002</td>
                        <td>Monitor HP (EQ-002)</td>
                        <td>María López</td>
                        <td>2025-04-01</td>
                        <td>Activo</td>
                        <td><a href="#">Ver</a> | <a href="#" style="color:#e74c3c;">Dar de Baja</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>