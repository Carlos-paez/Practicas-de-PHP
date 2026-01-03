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
    <title>Equipos - Optimized time</title>
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
                <li><a href="equipos.php" class="active"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="asignaciones.php"><i class="fas fa-user-tag"></i> Asignaciones</a></li>
                <li><a href="movimientos.php"><i class="fas fa-clipboard-list"></i> Movimientos</a></li>
                <li><a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
                <li><a href="configuracion.php"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="header">
                <h1>Gestión de Equipos</h1>
                <div>
                    <a href="../index.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
            </div>

            <a href="equipos.php?accion=nuevo" class="btn"><i class="fas fa-plus"></i> Registrar Nuevo Equipo</a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de datos (reemplazar con PHP/BD) -->
                    <tr>
                        <td>EQ-001</td>
                        <td>Laptop Dell</td>
                        <td>Portátil</td>
                        <td>Dell</td>
                        <td>Latitude 5420</td>
                        <td>Disponible</td>
                        <td><a href="#">Editar</a> | <a href="#" style="color:#e74c3c;">Eliminar</a></td>
                    </tr>
                    <tr>
                        <td>EQ-002</td>
                        <td>Monitor HP</td>
                        <td>Periférico</td>
                        <td>HP</td>
                        <td>Z24n</td>
                        <td>Asignado</td>
                        <td><a href="#">Editar</a> | <a href="#" style="color:#e74c3c;">Eliminar</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>