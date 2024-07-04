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

if (isset($_GET['id'])) {
    $empleado_id = $_GET['id'];
} else {
    header("Location: error.php");
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $insert_query = "INSERT INTO notificaciones (not_titulo, not_descripcion, not_empleado_id1, not_empleado_id2)
                    VALUES ('$titulo', '$descripcion', 1, 2)";
    $result_insert = mysqli_query($conn, $insert_query);

    if ($result_insert) {
        header("Location: Colaboradores.php?id=$empleado_id");
        exit;
    } else {
        echo "Error al agregar la notificación: " . mysqli_error($conn);
    }
}

$sql = "SELECT n.not_titulo, n.not_descripcion, e1.em_nombre AS nombre_empleado1, e2.em_nombre AS nombre_empleado2
        FROM notificaciones n
        INNER JOIN empleado e1 ON n.not_empleado_id1 = e1.em_id
        INNER JOIN empleado e2 ON n.not_empleado_id2 = e2.em_id";

$resultado = mysqli_query($conn, $sql);

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


    <style>
        .col-md-2 {
            z-index: 900;
            max-height: calc(100vh - 100px);
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 50px;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #343a40;
        }
    </style>
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
                <li><a class="dropdown-item" href="promociones_y_ofertas.php?id=<?php echo $empleado_id; ?>">Promociones
                        y Ofertas</a>
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

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-3 mb-4">
                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
                    <a href="#"
                        class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold me-3" style="flex: 1;">Notificaciones</span>
                    </a>
                    <div class="list-group list-group-flush border-bottom scrollarea">
                        <?php
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo '<a href="#" class="list-group-item list-group-item-action py-3 lh-tight">';
                            echo '<div class="d-flex w-100 align-items-center justify-content-between">';
                            echo '<strong class="mb-1">' . htmlspecialchars($fila['not_titulo']) . '</strong>';
                            echo '<small>' . htmlspecialchars($fila['nombre_empleado1']) . '</small>';
                            echo '</div>';
                            echo '<div class="col-10 mb-1 small">' . htmlspecialchars($fila['not_descripcion']) . '</div>';
                            echo '</a>';
                        }
                        ?>
                    </div>

                    <div class="p-3">
                        <h5>Agregar Notificación</h5>
                        <form method="post"
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $empleado_id; ?>">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Agregar Notificación</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-10">
                <div id="content-home" class="section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 p-3 mb-4">
                                <h2>Bienvenido a Cisne Chevrolet</h2>
                                <p>Somos líderes en la venta y servicio de vehículos Chevrolet en tu región. En Cisne
                                    Chevrolet, nos dedicamos a proporcionarte la mejor experiencia en la compra de tu
                                    próximo
                                    vehículo.</p>
                                <p>Nuestros valores fundamentales incluyen compromiso con la calidad, atención al
                                    cliente
                                    excepcional y la satisfacción total de nuestros clientes.</p>
                            </div>

                            <div class="col-md-6" style="height:  450px;">
                                <div class=" p-3 mb-4">
                                    <h3>Noticias Internas</h3>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Cambio en Políticas de Seguridad</h5>
                                            <p class="card-text">Hemos actualizado nuestras políticas de seguridad para
                                                garantizar un entorno de trabajo seguro. Se implementarán nuevas medidas
                                                a
                                                partir del próximo mes.</p>
                                            <a href="#" class="btn btn-primary">Leer más</a>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Programa de Capacitación</h5>
                                            <p class="card-text">Se ha lanzado un nuevo programa de capacitación para el
                                                desarrollo de habilidades técnicas y de liderazgo. Inscríbanse pronto
                                                para asegurar su lugar.</p>
                                            <a href="#" class="btn btn-primary">Leer más</a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-6" style="height: 420px; overflow-y: scroll;">
                                <div class=" p-3 mb-4">
                                    <h3>Reconocimiento de Empleados</h3>
                                    <p>Una sección para destacar a empleados destacados del mes o trimestre, con breves
                                        perfiles y logros destacados.</p>

                                    <h4>Lizbeth</h4>
                                    <p>Lizbeth ha demostrado un desempeño excepcional en el departamento de ventas,
                                        superando sus objetivos mensuales por un 20%.</p>

                                    <h4>Domingo</h4>
                                    <p>Domingo ha implementado eficientemente nuevas estrategias en el área de servicio
                                        al cliente, mejorando la satisfacción del cliente en un 15%.</p>

                                    <h4>Balver</h4>
                                    <p>Balver ha sido clave en la optimización de los procesos de inventario, reduciendo
                                        los tiempos de entrega en un 25%.</p>

                                    <h4>Wilder</h4>
                                    <p>Wilder ha liderado con éxito varios proyectos importantes, demostrando una
                                        excelente capacidad de gestión y liderazgo.</p>

                                    <h4>David</h4>
                                    <p>David ha desarrollado nuevas herramientas que han mejorado significativamente la
                                        eficiencia del equipo de TI.</p>

                                    <h4>Wilber</h4>
                                    <p>Wilber ha destacado en el departamento de marketing, creando campañas innovadoras
                                        que han aumentado el alcance de nuestra marca.</p>

                                    <h4>Anguel</h4>
                                    <p>Anguel ha mostrado un compromiso excepcional con la calidad y seguridad en el
                                        área de producción, asegurando altos estándares en todos los procesos.</p>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class=" p-3 mb-4">
                                    <h3>Calendario de Eventos</h3>
                                    <p>Calendario de proximas actividades</p>
                                    <object type="text/html" data="evo-calendar/evo-calendar/index.html"
                                        style="width: 100%; height: 650px;"></object>
                                </div>
                            </div>


                            <div class="col-md-6" style="height: 420px; overflow-y: scroll;">
                                <div class=" p-3 mb-4">
                                    <h3>Feedback de Clientes</h3>
                                    <p>Comentarios positivos recientes de clientes satisfechos, mostrando el impacto
                                        positivo del trabajo del equipo.</p>

                                    <h4>Cliente: Ana Rodríguez</h4>
                                    <p>"El servicio fue excelente. El equipo fue muy profesional y me ayudaron con todas
                                        mis dudas. Definitivamente recomendaré este lugar a mis amigos y familiares."
                                    </p>

                                    <h4>Cliente: Carlos Pérez</h4>
                                    <p>"Estoy muy contento con mi nuevo auto. La atención al cliente fue de primera y el
                                        proceso de compra fue muy sencillo y rápido. ¡Gracias a todo el equipo!"</p>

                                    <h4>Cliente: María López</h4>
                                    <p>"El mantenimiento de mi auto fue rápido y eficiente. El personal fue muy amable y
                                        me explicaron todo lo que se hizo. ¡Muy recomendable!"</p>

                                    <h4>Cliente: Juan Gómez</h4>
                                    <p>"Excelente servicio. Me ayudaron a encontrar justo lo que necesitaba y el precio
                                        fue muy competitivo. ¡Volveré sin duda!"</p>

                                    <h4>Cliente: Laura Martínez</h4>
                                    <p>"Muy satisfecho con la atención recibida. El equipo se tomó el tiempo de entender
                                        mis necesidades y me ofrecieron las mejores opciones. ¡Gran experiencia!"</p>

                                    <h4>Cliente: Pedro Sánchez</h4>
                                    <p>"Servicio de alta calidad y muy profesional. Mi auto quedó como nuevo y me
                                        ofrecieron consejos útiles para su mantenimiento. ¡Gracias!"</p>
                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class=" p-3 mb-4">
                                    <h3>Desempeño de Ventas</h3>
                                    <p>Gráficos o tablas que resuman el desempeño de ventas del mes o trimestre,
                                        destacando los objetivos alcanzados y áreas de mejora.</p>
                                    <canvas id="ventasAutosChart" width="400" height="400"></canvas>


                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>



<script>
    var ctx = document.getElementById('ventasAutosChart').getContext('2d');
    var ventasAutosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
            datasets: [{
                label: 'Ventas de Autos',
                data: [12, 19, 3, 5],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
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



</html>