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

$sql_empleado = "SELECT * FROM empleado WHERE em_id = ?";
$stmt = $conn->prepare($sql_empleado);
$stmt->bind_param("i", $empleado_id);
$stmt->execute();
$result_empleado = $stmt->get_result();

if ($result_empleado->num_rows > 0) {
    $empleado = $result_empleado->fetch_assoc();
    $nombre_empleado = $empleado['em_nombre'];
    $telefono_empleado = $empleado['em_celular'];
    $correo_empleado = $empleado['em_correo'];
} else {
    echo "No se encontró ningún empleado con ese ID.";
    exit;
}
$stmt->close();

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $sql_cliente = "SELECT * FROM cliente WHERE cl_dni = ?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    $stmt_cliente->bind_param("s", $dni);
    $stmt_cliente->execute();
    $result_cliente = $stmt_cliente->get_result();

    if ($result_cliente->num_rows > 0) {
        $cliente = $result_cliente->fetch_assoc();
        echo json_encode($cliente);
    } else {
        echo json_encode([]);
    }

    $stmt_cliente->close();
    exit;
}


$sql = "SELECT DISTINCT vh_modelo, vh_color, vh_marca, vh_año, vh_precio FROM vehiculo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $modelos = array();
    $colores = array();
    $detalles_vehiculos = array();


    while ($row = $result->fetch_assoc()) {
        $modelos[] = $row['vh_modelo'];
        $colores[] = $row['vh_color'];

        $detalles_vehiculos[$row['vh_modelo']] = array(
            'marca' => $row['vh_marca'],
            'anio' => $row['vh_año'],
            'precio' => $row['vh_precio']
        );
    }
} else {
    echo "No se encontraron modelos y colores de vehículos.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <li><a class="dropdown-item active" href="asesorVentas.php?id=<?php echo $empleado_id; ?>">Home</a>
                    </li>
                    <li><a class="dropdown-item" href="notaVenta.php?id=<?php echo $empleado_id; ?>">Hacer Nota de
                            Venta</a></li>
                    <li><a class="dropdown-item" href="proforma.php?id=<?php echo $empleado_id; ?>">Hacer proforma</a>
                    </li>
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

    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="text-center">
                    <h2>Nota de ventas</h2>
                    <hr>
                </div>
            </div>
            <div class="col-12">
                <div class="row mb-3">
                    <div class="col-5 text-center">Imagen del Logo</div>
                    <div class="col-4 text-center">Sede Lujiac</div>
                    <div class="col-3 text-center">Número de Proforma</div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="asesor">Asesor de Ventas:</label>
                        <input type="text" id="asesor" name="asesor" class="form-control"
                            value="<?php echo htmlspecialchars($nombre_empleado); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control"
                            value="<?php echo htmlspecialchars($telefono_empleado); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" class="form-control"
                            value="<?php echo htmlspecialchars($correo_empleado); ?>">
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <h2>Datos del Cliente</h2>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="dni">DNI:</label>
                            <input type="text" id="dni" name="dni" class="form-control">
                        </div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-primary" onclick="obtenerDatosCliente()">Obtener Datos
                                del
                                Cliente</button>
                        </div>
                        <div class="col-md-4">
                            <label for="nombre_cliente">Nombre del Cliente:</label>
                            <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="telefono_cliente">Teléfono:</label>
                            <input type="text" id="telefono_cliente" name="telefono_cliente" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="correo_cliente">Correo Electrónico:</label>
                            <input type="email" id="correo_cliente" name="correo_cliente" class="form-control">
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-12">
                    <h2>Detalle de Vehículo</h2>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="modelo">Modelo:</label>
                            <select id="modelo" name="modelo" class="form-select">
                                <?php foreach ($modelos as $modelo): ?>
                                    <option value="<?php echo htmlspecialchars($modelo); ?>">
                                        <?php echo htmlspecialchars($modelo); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="color">Color:</label>
                            <select id="color" name="color" class="form-select">
                                <?php foreach ($colores as $color): ?>
                                    <option value="<?php echo htmlspecialchars($color); ?>">
                                        <?php echo htmlspecialchars($color); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="marca">Marca:</label>
                            <input type="text" id="marca" name="marca" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="año">Año:</label>
                            <input type="text" id="año" name="año" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="precio">Precio:</label>
                            <input type="text" id="precio" name="precio" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-5">
                <button type="button" class="btn btn-primary">Generar Proforma</button>
            </div>
        </div>
    </div>

    <script>
        function obtenerDatosCliente() {
            var dni = document.getElementById('dni').value;
            if (dni === '') {
                alert('Por favor, ingrese un DNI.');
                return;
            }
            fetch('notaVenta.php?id=<?php echo $empleado_id; ?>&dni=' + dni)
                .then(response => response.json())
                .then(data => {
                    if (Object.keys(data).length > 0) {
                        document.getElementById('nombre_cliente').value = data.cl_nombre;
                        document.getElementById('telefono_cliente').value = data.cl_celular;
                        document.getElementById('correo_cliente').value = data.cl_correo;
                    } else {
                        alert('No se encontró un cliente con el DNI proporcionado.');
                    }
                })
                .catch(error => {
                    console.error('Error al obtener los datos del cliente:', error);
                });
        }


        document.getElementById('modelo').addEventListener('change', function () {
            var modeloSeleccionado = this.value;
            var detallesVehiculo = <?php echo json_encode($detalles_vehiculos); ?>;


            document.getElementById('marca').value = detallesVehiculo[modeloSeleccionado]['marca'];
            document.getElementById('año').value = detallesVehiculo[modeloSeleccionado]['anio'];
            document.getElementById('precio').value = detallesVehiculo[modeloSeleccionado]['precio'];
        });
    </script>
</body>

</html>