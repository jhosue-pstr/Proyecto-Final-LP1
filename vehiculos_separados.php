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
$sql = "SELECT hp_id, hp_descripcion, hp_codigo, hp_vh_id, hp_cl_id, hp_mp_id
        FROM historial_separacion_vehiculos";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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

    <div id="content-vehiculos_separados" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Vehículos Separados</h2>
                    <p>Aquí puedes visualizar los vehículos que han sido separados del inventario principal.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class=" p-3 mb-4">
                        <h3>Lista de Vehículos Separados</h3>
                        <div class="row">

                            <div class="col-md-6">
                                <form>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Buscar vehículo...">
                                        <button class="btn btn-outline-secondary" type="button">Buscar</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" style="height    : 400px; ">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Código</th>
                                        <th scope="col">ID del Vehículo</th>
                                        <th scope="col">ID del Cliente</th>
                                        <th scope="col">ID del Método de Pago</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["hp_id"] . "</td>";
                                            echo "<td>" . $row["hp_descripcion"] . "</td>";
                                            echo "<td>" . $row["hp_codigo"] . "</td>";
                                            echo "<td>" . $row["hp_vh_id"] . "</td>";
                                            echo "<td>" . $row["hp_cl_id"] . "</td>";
                                            echo "<td>" . $row["hp_mp_id"] . "</td>";
                                            echo "<td> Acciones </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No hay registros en el historial de separación de vehículos.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                </div>
            </div>

        </div>
    </div>


    <div id="alert-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="alert-toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notificación</strong>
                <small>Ahora mismo</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Acción importante realizada en vehículos separados.
            </div>
        </div>
    </div>








</body>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        async function obtenerDatos() {
            try {
                const response = await fetch('vehiculos_separados.php');
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                const data = await response.json();

                const tableBody = document.getElementById('inventoryTable');
                tableBody.innerHTML = '';

                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>${row.hp_id}</td>
                    <td>${row.hp_descripcion}</td>
                    <td>${row.hp_codigo}</td>
                    <td>${row.vh_marca}</td>
                    <td>${row.cl_nombre}</td>
                    <td>${row.mp_metodo_pago}</td>
                    <td>                    
       <button type="button" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"></path>
</svg>
              </button>
                    </div></td>
                `;
                    tableBody.appendChild(tr);
                });
            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }

        obtenerDatos();
    });
</script>

</html>