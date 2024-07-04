<?php
session_start();

// Verificar si el usuario está autenticado
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

$sql_repuestos_utilizados = "SELECT ru.ru_id, r.rp_nombre, ru.cantidad_utilizada, ru.fecha_utilizacion, ru.detalle 
                             FROM repuestos_utilizados ru
                             INNER JOIN repuesto r ON ru.rp_id = r.rp_id";
$result_repuestos_utilizados = $conn->query($sql_repuestos_utilizados);

$repuestos_utilizados = [];
if ($result_repuestos_utilizados->num_rows > 0) {
    while ($row = $result_repuestos_utilizados->fetch_assoc()) {
        $repuestos_utilizados[] = $row;
    }
} else {
    echo "0 resultados de repuestos utilizados";
}

$sql_repuestos = "SELECT r.rp_marca, r.rp_modelo, r.rp_estado, r.rp_precio_base, r.rp_nombre, COALESCE(s.cantidad_disponible, 0) AS cantidad_disponible
                  FROM repuesto r
                  LEFT JOIN stock s ON r.rp_id = s.elemento_id AND s.tipo_elemento = 'repuesto'";
$result_repuestos = $conn->query($sql_repuestos);

$stock_repuestos = [];
if ($result_repuestos->num_rows > 0) {
    while ($row = $result_repuestos->fetch_assoc()) {
        $stock_repuestos[] = $row;
    }
} else {
    echo "0 resultados de stock de repuestos";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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

    <div id="content-home" class="section">
        <div class="container">
            <div class="row mt-5">
                <div class="col-3">
                    <input id="searchInput1" type="text" class="form-control" placeholder="Buscar productos...">
                </div>
                <div class="col-2">
                    <select id="categoryFilter1" class="form-control">
                        <option value="">Filtrar estado</option>
                        <option value="usado">Usado</option>
                        <option value="nuevo">Nuevo</option>
                    </select>
                </div>
                <div class="col-2">
                    <select id="colorFilter1" class="form-control">
                        <option value="">Filtrar por marca</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Ford">Ford</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 border border-dark p-2" style="height: 400px; overflow-y: auto;">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stock_repuestos as $stock): ?>
                                <tr>
                                    <td><?php echo $stock['rp_marca']; ?></td>
                                    <td><?php echo $stock['rp_modelo']; ?></td>
                                    <td><?php echo $stock['rp_estado']; ?></td>
                                    <td><?php echo $stock['rp_precio_base']; ?></td>
                                    <td><?php echo $stock['rp_nombre']; ?></td>
                                    <td><?php echo $stock['cantidad_disponible']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 border border-dark p-2" style="height: 400px; overflow-y: auto;">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre Repuesto</th>
                                <th>Cantidad Utilizada</th>
                                <th>Fecha Utilización</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($repuestos_utilizados as $repuesto): ?>
                                <tr>
                                    <td><?php echo $repuesto['rp_nombre']; ?></td>
                                    <td><?php echo $repuesto['cantidad_utilizada']; ?></td>
                                    <td><?php echo $repuesto['fecha_utilizacion']; ?></td>
                                    <td><?php echo $repuesto['detalle']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>






</body>



</html>