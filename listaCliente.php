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

// Manejo de inserción de nuevo servicio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $sr_id = $_POST['sr_id'] ?? '';
    $cl_id = $_POST['cl_id'] ?? '';
    $mp_id = $_POST['mp_id'] ?? '';

    $sql_insert = "INSERT INTO historial_separacion_servicios (hps_descripcion, hps_codigo, hps_sr_id, hps_cl_id, hps_mp_id) 
                   VALUES ('$descripcion', '$codigo', '$sr_id', '$cl_id', '$mp_id')";

    if ($conn->query($sql_insert) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    exit;
}

// Obtener datos de historial de separación de servicios
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
    <title>Información del Cliente - Cisne Chevrolet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <section id="informacion-cliente" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Información del Cliente</h2>
                    <p>Aquí puedes mostrar detalles específicos del cliente y su historial relacionado con la
                        concesionaria. </p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Descripción Servicio</th>
                                    <th scope="col">Fecha de Servicio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $cliente) {
                                    echo "<tr>";
                                    echo "<td>{$cliente['id']}</td>";
                                    echo "<td>{$cliente['cliente']}</td>";
                                    echo "<td>{$cliente['direccion']}</td>";
                                    echo "<td>{$cliente['correo']}</td>";
                                    echo "<td>{$cliente['telefono']}</td>";
                                    echo "<td>{$cliente['descripcion_servicio']}</td>";
                                    echo "<td>{$cliente['fecha_servicio']}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalAgregarServicio">Programar Nuevo Servicio</button>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h3>Mensajes</h3>
                <div id="mensajes" class="border p-3 mb-3">
                    <!-- Aquí se mostrarán los mensajes -->
                </div>
                <form id="formularioMensaje" class="mb-3" action="enviar_mensaje.php" method="post">
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Nuevo Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="py-3 mt-5 bg-light">
        <div class="container text-center">
            <p>&copy; 2024 Cisne Chevrolet. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Modal Agregar Servicio -->
    <div class="modal fade" id="modalAgregarServicio" tabindex="-1" aria-labelledby="modalAgregarServicioLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarServicioLabel">Agregar Nuevo Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAgregarServicio" method="post">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción del Servicio</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                        </div>
                        <div class="mb-3">
                            <label for="sr_id" class="form-label">ID de Servicio</label>
                            <input type="number" class="form-control" id="sr_id" name="sr_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="cl_id" class="form-label">ID de Cliente</label>
                            <input type="number" class="form-control" id="cl_id" name="cl_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="mp_id" class="form-label">ID de Método de Pago</label>
                            <input type="number" class="form-control" id="mp_id" name="mp_id" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Servicio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>