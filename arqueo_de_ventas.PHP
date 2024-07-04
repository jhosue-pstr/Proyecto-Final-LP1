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

$sqlAutos = "SELECT vh_id, vh_marca, vh_modelo, vh_color, vh_precio FROM vehiculo";
$resultAutos = $conn->query($sqlAutos);

$query = "SELECT vdr.vdr_id, vdr.vdr_pd_id, vdr.vdr_valor_venta_item, 
                 rp.rp_nombre AS r_nombre, rp.rp_codigo AS r_codigo
          FROM venta_detalle_repuestos vdr 
          INNER JOIN repuesto rp ON vdr.vdr_pd_id = rp.rp_id";
$resultRepuestos = $conn->query($query);

$sql = "SELECT vds.vds_id, sr.sr_nombre AS descripcion, vds.vds_valor_venta_item AS precio
        FROM venta_detalle_servicios vds
        INNER JOIN servicio sr ON vds.vds_pd_id = sr.sr_id";
$resultServicios = $conn->query($sql);

$conn->close();
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

    <div id="content-gestor_de_inventario" class="section">
        <div class="container">
            <h1>Arqueo de ventas</h1>
            <P>ver las ventas de una manera facil </P>
            <div class="row mb-3">
                <div class="col-md-4  mb-4" style="height: 300px; overflow-y: scroll;">
                    <h3>Autos</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultAutos->num_rows > 0) {
                                    while ($row = $resultAutos->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['vh_id'] . "</td>";
                                        echo "<td>" . $row['vh_modelo'] . "</td>";
                                        echo "<td>" . $row['vh_color'] . "</td>";
                                        echo "<td>" . $row['vh_precio'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4  mb-4" style="height: 300px; overflow-y: scroll;">
                    <h3>Repuestos</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultRepuestos->num_rows > 0) {
                                    while ($row = $resultRepuestos->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['vdr_id'] . "</td>";
                                        echo "<td>" . $row['r_nombre'] . "</td>";
                                        echo "<td>" . $row['r_codigo'] . "</td>";
                                        echo "<td>" . $row['vdr_valor_venta_item'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4  mb-4" style="height: 300px; overflow-y: scroll;">
                    <h3>Servicios de Mantenimiento</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultServicios->num_rows > 0) {
                                    while ($row = $resultServicios->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['vds_id'] . "</td>";
                                        echo "<td>" . $row['descripcion'] . "</td>";
                                        echo "<td>" . $row['precio'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <canvas id="chartVentas" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="chartProyecciones" width="400" height="300"></canvas>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h3>Historial de Acciones</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Usuario X realizó acción Y en fecha Z</li>
                        <li class="list-group-item">Usuario A modificó registro B en fecha C</li>
                        <li class="list-group-item">Acción D ejecutada por Usuario E en fecha F</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-3 mt-5 bg-dark text-white">
        <div class="container text-center">
            <p>&copy; 2024 Cisne Chevrolet. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        var ctx1 = document.getElementById('chartVentas').getContext('2d');
        var chartVentas = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: 'Ventas',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
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

        var ctx2 = document.getElementById('chartProyecciones').getContext('2d');
        var chartProyecciones = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
                datasets: [{
                    label: 'Proyección de Ventas',
                    data: [10, 15, 25, 18, 20],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
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