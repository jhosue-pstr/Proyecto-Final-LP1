<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: error.php");
    exit;
}

$empleado_id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql_combinadas = "
    SELECT
        em.em_nombre,
        COALESCE(SUM(vs.vts_valor_venta_total), 0) AS total_ventas_servicio,
        COALESCE(SUM(vr.vtr_valor_venta_total), 0) AS total_ventas_repuestos,
        COALESCE(SUM(vv.vtv_valor_venta_total), 0) AS total_ventas_vehiculos,
        (COALESCE(SUM(vs.vts_valor_venta_total), 0) + COALESCE(SUM(vr.vtr_valor_venta_total), 0) + COALESCE(SUM(vv.vtv_valor_venta_total), 0)) AS total_ventas_combinadas
    FROM
        empleado em
    LEFT JOIN
        venta_de_servicio vs ON em.em_id = vs.vts_em_id
    LEFT JOIN
        ventas_de_repuestos vr ON em.em_id = vr.vtr_em_id
    LEFT JOIN
        ventas_de_vehiculo vv ON em.em_id = vv.vtv_em_id
    GROUP BY
        em.em_nombre
    ORDER BY
        total_ventas_combinadas DESC
";

$result_combinadas = $conn->query($sql_combinadas);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="ColaboradoresS.css">
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
                    <li><a class="dropdown-item active" href="Colaboradores.php?id=<?php echo $empleado_id; ?>">Home</a>
                    </li>
                    <li><a class="dropdown-item" href="gestor_de_inventario.php?id=<?php echo $empleado_id; ?>">Gestor
                            de Inventario</a></li>
                    <li><a class="dropdown-item" href="vehiculos_separados.php?id=<?php echo $empleado_id; ?>">Vehículos
                            Separados</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="arqueo_de_ventas.php?id=<?php echo $empleado_id; ?>">Arqueo de
                            Ventas</a></li>
                    <li><a class="dropdown-item" href="ranking_de_asesores.php?id=<?php echo $empleado_id; ?>">Ranking
                            de Asesores</a></li>
                    <li><a class="dropdown-item"
                            href="promociones_y_ofertas.php?id=<?php echo $empleado_id; ?>">Promociones y Ofertas</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center">
                <form class="w-100 me-3">
                    <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search">
                </form>

                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                        <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div id="ranking-asesores" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Ranking de Asesores</h2>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button id="btnActualizarDatos" class="btn btn-primary me-3">Actualizar Datos</button>
                            <button id="btnExportarPDF" class="btn btn-success me-3">Exportar a PDF</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Posición</th>
                                    <th>Nombre</th>
                                    <th>Ventas Auto</th>
                                    <th>Ventas Repuestos</th>
                                    <th>Ventas Servicios</th>
                                    <th>Ventas Totales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result_combinadas->num_rows > 0) {
                                    $posicion = 1;
                                    while ($row = $result_combinadas->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $posicion++ . "</td>";
                                        echo "<td>" . $row['em_nombre'] . "</td>";
                                        echo "<td>" . $row['total_ventas_vehiculos'] . "</td>";
                                        echo "<td>" . $row['total_ventas_repuestos'] . "</td>";
                                        echo "<td>" . $row['total_ventas_servicio'] . "</td>";
                                        echo "<td>" . $row['total_ventas_combinadas'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No hay datos disponibles</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        <h3>Ventas Combinadas por Empleado</h3>
                        <canvas id="ventasCombinadasChart" style="max-width: 800px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var nombresEmpleados = [];
        var ventasCombinadas = [];

        <?php
        if ($result_combinadas->num_rows > 0) {
            while ($row = $result_combinadas->fetch_assoc()) {
                echo "nombresEmpleados.push('" . $row['em_nombre'] . "');";
                echo "ventasCombinadas.push(" . $row['total_ventas_combinadas'] . ");";
            }
        }
        ?>

        var ctx = document.getElementById('ventasCombinadasChart').getContext('2d');
        var ventasCombinadasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombresEmpleados,
                datasets: [{
                    label: 'Ventas Combinadas',
                    data: ventasCombinadas,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>