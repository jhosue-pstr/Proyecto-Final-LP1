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
$database = "db_cisne";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$sql = "
SELECT 
    vts.vts_id,
    c.cl_nombre AS cliente_nombre,
    c.cl_celular AS cliente_celular,
    c.cl_correo AS cliente_correo,
    vts.vts_estado,
    s.sr_nombre AS servicio_nombre,
    s.sr_descripcion,
    s.sr_fecha_y_hora,
    pd.pd_descripcion AS descripcion_promocion,
    vts.vts_valor_venta_total AS monto_final
FROM 
    venta_de_servicio vts
JOIN 
    cliente c ON vts.vts_cl_id = c.cl_id
JOIN 
    servicio s ON vts.vts_sr_id = s.sr_id
LEFT JOIN 
    promociones_y_descuentos pd ON vts.vts_pf_id = pd.pd_id
";

$result = $conn->query($sql);
if (!$result) {
    die("Error al ejecutar la consulta: " . $conn->error);
}

// Inicializar arrays para los diferentes tipos de servicios
$mantenimientos = array();
$servicios = array();

// Filtrar los resultados en los arrays correspondientes
while ($row = $result->fetch_assoc()) {
    if (strpos(strtolower($row['sr_descripcion']), 'mantenimiento') !== false) {
        $mantenimientos[] = $row;
    } else {
        $servicios[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Mensual - Cisne Chevrolet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="ColaboradoresS.css">
    <script src="Colaboradores.js"></script>
</head>

<body>
    <header class="py-3 mb-3 border-bottom bg-dark">
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

    <section id="reporte-mensual" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Mantenimientos Realizados</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">N# Mantenimiento</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mantenimientos as $servicio): ?>
                                <tr>
                                    <td><?php echo $servicio['vts_id']; ?></td>
                                    <td><?php echo $servicio['sr_descripcion']; ?></td>
                                    <td><?php echo $servicio['sr_fecha_y_hora']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h2>Servicios Realizados</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">N# Servicio</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($servicios as $servicio): ?>
                                <tr>
                                    <td><?php echo $servicio['vts_id']; ?></td>
                                    <td><?php echo $servicio['sr_descripcion']; ?></td>
                                    <td><?php echo $servicio['sr_fecha_y_hora']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <h2>Servicios de clientes </h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Tipo de Servicio</th>
                                <th>Descuento</th>
                                <th>Monto Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $row['vts_id']; ?></td>
                                    <td><?php echo $row['cliente_nombre']; ?></td>
                                    <td><?php echo $row['cliente_celular']; ?></td>
                                    <td><?php echo $row['cliente_correo']; ?></td>
                                    <td><?php echo $row['vts_estado']; ?></td>
                                    <td><?php echo $row['servicio_nombre']; ?></td>
                                    <td><?php echo $row['descripcion_promocion']; ?></td>
                                    <td><?php echo $row['monto_final']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <h2>Gráfico de Mantenimientos</h2>
                    <canvas id="graficoMantenimientos" width="400" height="200"></canvas>
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