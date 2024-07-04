<?php
session_start();

if (!isset($_SESSION['loggedin']) || !isset($_SESSION['usuario']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $empleado_id = $_GET['id'];
} else {
    header("Location: error.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$sql_select = "SELECT 
                hps.hps_id AS id,
                c.cl_nombre AS cliente,
                c.cl_direccion AS direccion,
                c.cl_correo AS correo,
                c.cl_celular AS telefono,
                s.sr_descripcion AS descripcion_servicio,
                s.sr_fecha_y_hora AS fecha_servicio
               FROM 
                historial_separacion_servicios hps
               JOIN 
                cliente c ON hps.hps_cl_id = c.cl_id
               JOIN 
                servicio s ON hps.hps_sr_id = s.sr_id";

$result = $conn->query($sql_select);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas de Mantenimiento - Cisne Chevrolet</title>
    <!-- Enlaces a Bootstrap y otras bibliotecas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            padding-top: 4.5rem;
            /* Ajuste para la barra de navegación fija */
        }

        #calendario {
            margin-bottom: 20px;
            max-width: 100%;
        }

        #lista-mantenimientos {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <!-- Encabezado y barra de navegación -->
    <header class="py-3 mb-3 border-bottom bg-dark fixed-top">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <div class="dropdown">
                <a href="#"
                    class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle"
                    id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/imagenes/logo.jpeg" alt="Logo" width="150" height="50">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
                    <li><a class="dropdown-item active" href="jefeservicios.php?id=<?php echo $empleado_id; ?>">Home</a>
                    </li>
                    <li><a class="dropdown-item" href="listaCliente.php?id=<?php echo $empleado_id; ?>">Info
                            Clientes</a></li>
                    <li><a class="dropdown-item"
                            href="MantenimeintoCalendario.php?id=<?php echo $empleado_id; ?>">Fechas de
                            Mantenimiento</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="reporte.php?id=<?php echo $empleado_id; ?>">Reporte Mensual</a>
                    </li>
                    <li><a class="dropdown-item" href="stock.php?id=<?php echo $empleado_id; ?>">Inventario De
                            Repuestos</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <form class="w-100 me-3">
                    <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search">
                </form>
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/imagenes/wilder.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section id="fechas-mantenimiento" class="section">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-4">Calendario de Mantenimientos</h2>
                    <object type="text/html" data="evo-calendar/evo-calendar/index.html"
                        style="width: 100%; height: 650px;"></object>
                </div>
                <div class="col-md-4">
                    <h2 class="mb-4">Mantenimientos Pendientes</h2>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $cliente) {
                                echo "<tr>";
                                echo "<td>{$cliente['id']}</td>";
                                echo "<td>{$cliente['cliente']}</td>";
                                echo "<td>{$cliente['fecha_servicio']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-3 mt-5 bg-light">
        <div class="container text-center">
            <p>&copy; 2024 Cisne Chevrolet. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>





</html>