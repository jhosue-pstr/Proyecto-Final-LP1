<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $monto = $_POST['monto'];
    $condiciones = $_POST['condiciones'];

    if (empty($nombre) || empty($descripcion) || empty($fecha_inicio) || empty($fecha_fin) || empty($monto) || empty($condiciones)) {
        echo "Todos los campos son obligatorios.";
    } else {
        $sql_insert = "INSERT INTO promociones_y_descuentos (pd_nombre_promocion, pd_descripcion, pd_fecha_inicio, pd_fecha_fin, pd_monto, pd_condiciones)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssss", $nombre, $descripcion, $fecha_inicio, $fecha_fin, $monto, $condiciones);


    }
}

// Consulta para obtener todas las promociones y descuentos
$sql_select = "SELECT * FROM promociones_y_descuentos";
$result = $conn->query($sql_select);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

    <div id="promociones-ofertas" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Promociones y Ofertas Vigentes</h2>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Monto</th>
                                    <th>Condiciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['pd_id'] . "</td>";
                                        echo "<td>" . $row['pd_nombre_promocion'] . "</td>";
                                        echo "<td>" . $row['pd_descripcion'] . "</td>";
                                        echo "<td>" . $row['pd_fecha_inicio'] . "</td>";
                                        echo "<td>" . $row['pd_fecha_fin'] . "</td>";
                                        echo "<td>" . $row['pd_monto'] . "</td>";
                                        echo "<td>" . $row['pd_condiciones'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No hay promociones o descuentos registrados.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="modal-body">
                        <h2>Agregar Nueva Promoción o Descuento</h2>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Promoción</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                            </div>
                            <div class="mb-3">
                                <label for="monto" class="form-label">Monto de Descuento o Promoción</label>
                                <input type="text" class="form-control" id="monto" name="monto" required>
                            </div>
                            <div class="mb-3">
                                <label for="condiciones" class="form-label">Condiciones</label>
                                <textarea class="form-control" id="condiciones" name="condiciones" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Promoción</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>