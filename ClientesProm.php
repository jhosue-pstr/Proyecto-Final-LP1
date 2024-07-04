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
                <li><a class="dropdown-item active" href="jefeventa.php?id=<?php echo $empleado_id; ?>">Home</a>
                </li>
                <li><a class="dropdown-item" href="ClientesProm.php?id=<?php echo $empleado_id; ?>">Clientes</a>
                </li>
                <li><a class="dropdown-item" href="reportesMensuales.php?id=<?php echo $empleado_id; ?>">Reportes
                        Mensuales</a></li>
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
    <div id="content-gestor_de_inventario" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h2>Promociones para Clientes</h2>
                    <div class="row mt-4">
                        <div class="col-md-12  border border-dark p-2 " style=" height: 400px; overflow-y: auto;">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Celular</th>
                                        <th>Correo</th>
                                        <th>Vehículo</th>
                                        <th>Descuento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT c.cl_nombre AS nombre_cliente, c.cl_direccion AS direccion, c.cl_celular AS celular, c.cl_correo AS correo,
                                                   v.vh_modelo AS vehiculo, pd.pd_id AS promocion_id, pd.pd_nombre_promocion AS nombre_promocion
                                            FROM ventas_de_vehiculo vv
                                            INNER JOIN cliente c ON vv.vtv_cl_id = c.cl_id
                                            INNER JOIN vehiculo v ON vv.vtv_vh_id = v.vh_id
                                            LEFT JOIN venta_detalle_vehiculo vdv ON vv.vtv_vdv_id = vdv.vdv_id
                                            LEFT JOIN promociones_y_descuentos pd ON vdv.vdv_pd_id = pd.pd_id";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nombre_cliente'] . "</td>";
                                            echo "<td>" . $row['direccion'] . "</td>";
                                            echo "<td>" . $row['celular'] . "</td>";
                                            echo "<td>" . $row['correo'] . "</td>";
                                            echo "<td>" . $row['vehiculo'] . "</td>";

                                            $sql_promociones = "SELECT pd_id, pd_nombre_promocion FROM promociones_y_descuentos";
                                            $result_promociones = $conn->query($sql_promociones);

                                            echo "<td>";
                                            echo "<select class='form-select'>";
                                            while ($row_promocion = $result_promociones->fetch_assoc()) {
                                                $selected = ($row['promocion_id'] == $row_promocion['pd_id']) ? 'selected' : '';
                                                echo "<option value='" . $row_promocion['pd_id'] . "' $selected>" . $row_promocion['pd_nombre_promocion'] . "</option>";
                                            }
                                            echo "</select>";
                                            echo "</td>";

                                            echo "<td> botones </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.editable-column').forEach(item => {
            item.addEventListener('blur', function () {
                const id = this.getAttribute('data-id');
                const column = this.getAttribute('data-column');
                const value = this.innerText.trim();

                fetch('update_promocion.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: id,
                        column: column,
                        value: value
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>