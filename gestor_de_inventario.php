<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marcaModelo = $_POST['marcaModelo'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare("INSERT INTO vehiculo (vh_marca, vh_modelo, vh_color, vh_precio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $marcaModelo, $modelo, $color, $precio);

    $marcaModelo = $_POST['marcaModelo'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];

    $stmt->execute();
    $vehiculo_id = $stmt->insert_id;
    $stmt->close();

    $stmt = $conn->prepare("INSERT INTO stock (elemento_id, tipo_elemento, cantidad_disponible) VALUES (?, 'vehiculo', ?)");
    $stmt->bind_param("ii", $vehiculo_id, $cantidad);

    $cantidad = $_POST['cantidad'];

    $stmt->execute();
    $stmt->close();

    header("Location: gestor_de_inventario.php?id=" . $empleado_id);
    exit;
}

$sql_vehiculos = "SELECT v.vh_marca, v.vh_modelo, v.vh_color, v.vh_precio, COALESCE(s.cantidad_disponible, 0) AS cantidad_disponible
                  FROM vehiculo v
                  LEFT JOIN stock s ON v.vh_id = s.elemento_id AND s.tipo_elemento = 'vehiculo'";
$result_vehiculos = $conn->query($sql_vehiculos);

$sql_repuestos = "SELECT r.rp_marca, r.rp_modelo, r.rp_estado, r.rp_precio_base, r.rp_nombre, COALESCE(s.cantidad_disponible, 0) AS cantidad_disponible
                  FROM repuesto r
                  LEFT JOIN stock s ON r.rp_id = s.elemento_id AND s.tipo_elemento = 'repuesto'";
$result_repuestos = $conn->query($sql_repuestos);

?>



<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="gestor_de_inventario.js"></script>

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
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login.php">Cerrar sesión</a></li>
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
                    <h2>Gestor de Inventario</h2>
                    <p>Gestiona y vizualiza el almacen de una manera facil y rapida.</p>

                </div>

                <div class="container ">

                    <div class="col-12">
                        <div class="row mt-4">
                            <h2>Vehiculos</h2>
                            <div class="col-3">
                                <input id="searchInput" type="text" class="form-control"
                                    placeholder="Buscar productos...">
                            </div>

                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalAgregarVehiculo">
                                    Agregar Vehículo
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row mt-4">
                <div class="col-md-12  border border-dark p-2 " style=" height: 400px; overflow-y: auto;">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Marca y Modelo</th>
                                <th>Color</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_vehiculos->num_rows > 0) {
                                while ($row = $result_vehiculos->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["vh_marca"] . ' ' . $row["vh_modelo"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["vh_color"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["vh_precio"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["cantidad_disponible"]) . "</td>";
                                    echo "<td> Acciones </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No hay vehículos disponibles.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>


    <!-- Bootstrap Modal para agregar nuevo vehículo -->
    <div class="modal fade" id="modalAgregarVehiculo" tabindex="-1" aria-labelledby="modalAgregarVehiculoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarVehiculoLabel">Agregar Nuevo Vehículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Formulario para agregar vehículo -->
                    <form action="gestor_de_inventario.php" method="POST">
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="mb-3">
                            <label for="año" class="form-label">Año</label>
                            <input type="text" class="form-control" id="año" name="año" required>
                        </div>
                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" required>
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Vehículo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>



    <div class="container">
        <div class="row mt-4">
            <h2>Repuestos</h2>
            <div class="col-3">
                <input id="searchInput1" type="text" class="form-control" placeholder="Buscar productos...">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 border border-dark p-2" style="height: 400px; overflow-y: auto;">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Marca y Modelo</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_repuestos->num_rows > 0) {
                            while ($row = $result_repuestos->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["rp_marca"] . ' ' . $row["rp_modelo"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["rp_estado"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["rp_precio_base"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["rp_nombre"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["cantidad_disponible"]) . "</td>";
                                echo "<td> Acciones </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No hay repuestos disponibles.</td></tr>";
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

</html>

<?php
$conn->close();
?>