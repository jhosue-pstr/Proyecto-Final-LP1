<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_cisne";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $empleado_id = $_GET['id'];
} else {
    header("Location: error.php");
    exit;
}
$sql = "SELECT 
            v.vtv_id, 
            c.cl_nombre AS cliente, 
            c.cl_celular AS celular, 
            c.cl_correo AS correo, 
            ve.vh_id AS vehiculo_id, 
            ve.vh_modelo AS vehiculo_modelo, 
            ve.vh_placa AS placa, 
            ve.vh_codigo AS codigo 
        FROM ventas_de_vehiculo v
        INNER JOIN cliente c ON v.vtv_cl_id = c.cl_id
        INNER JOIN vehiculo ve ON v.vtv_vh_id = ve.vh_id";
$result = $conn->query($sql);

?>





<!DOCTYPE html>
<html lang="es">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>
<header class="py-3 mb-3 border-bottom bg-dark">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div class="dropdown">
            <a href="#"
                class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle"
                id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/imagenes/logo.jpeg" alt="Logo" width="150" height="50">
            </a>

            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
                <li><a class="dropdown-item active" href="gestora.php?id=<?php echo $empleado_id; ?>">Home</a>
                </li>
                <li><a class="dropdown-item" href="PapelesAuto.php?id=<?php echo $empleado_id; ?>">Gestor
                        de Inventario</a></li>

            </ul>
        </div>

        <div class="d-flex align-items-center">
            <form class="w-100 me-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<body>

    <div class="container">
        <h2>Clientes con Papeles Pendientes</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="col-1">Cliente</th>
                    <th class="col-1">Celular</th>
                    <th class="col-1">Correo</th>
                    <th class="col-2">Vehiculo </th>
                    <th class="col-3">Placa </th>
                    <th class="col-4">Codigo </th>
                    <th class="col-2">Papeles </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['cliente'] . "</td>";
                        echo "<td>" . $row['celular'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "<td>" . $row['vehiculo_modelo'] . "</td>";
                        echo "<td>" . $row['placa'] . "</td>";
                        echo "<td>" . $row['codigo'] . "</td>";
                        echo "<td><button onclick=\"verImagen('/imagenes/carta.pdf')\">Ver</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron registros</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>














</body>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    function verImagen(rutaImagen) {
        window.open(rutaImagen, '_blank');
    }

</script>

</html>