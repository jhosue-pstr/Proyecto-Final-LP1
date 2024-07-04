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
$database = "db_cisne";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}


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
?>

<html>

<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="mantenimiento.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="scripts.js" defer></script>
</head>

<header>

    <div class="logo"><a href="index.php"><img src="/imagenes/logo.jpeg"></a></div>

    <ul class="VEHÍCULOS">
        <li><a href="">VEHÍCULOS</a>
            <ul>
                <li><a href="vehiculos.php?id=<?php echo $cliente_id; ?>">TODOS LOS MODELOS</a></li>
                <li><a href="vehiculos.php?id=<?php echo $cliente_id; ?>">AUTOS</a></li>
                <li><a href="vehiculos.php?id=<?php echo $cliente_id; ?>">CAMIONETAS</a></li>
                <li><a href="vehiculos.php?id=<?php echo $cliente_id; ?>">PICK-UPS</a></li>
                <li><a href="vehiculos.php?id=<?php echo $cliente_id; ?>">COMERCIALES</a></li>
            </ul>
        </li>
    </ul>

    <ul class="POSVENTA">
        <li><a href="">POSVENTA</a>
            <ul>
                <li><a href="https://www.cisnechevrolet.com.pe/experiencia-chevrolet-premium">EXPERIENCIA CHEVROLET
                        PREMIUM</a></li>
                <li><a href="https://www.cisnechevrolet.com.pe/servicios">SERVICIOS</a></li>
                <li><a href="https://www.cisnechevrolet.com.pe/repuestos">REPUESTOS</a></li>
                <li><a href="https://www.cisnechevrolet.com.pe/garantia-chevrolet">GARANTIA CHEVROLET</a></li>
            </ul>
        </li>
    </ul>

    <ul class="OFERTAS">
        <li><a href="">OFERTAS</a>
            <ul>
                <li><a href="https://www.cisnechevrolet.com.pe/ofertas">TODAS LAS OFERTAS</a></li>
                <li><a href="https://www.cisnechevrolet.com.pe/ofertas?categoriadelasofertas=vehiculosnuevos">OFERTA
                        DE NUEVOS VEHÍCULOS</a></li>
            </ul>
        </li>
    </ul>

    <ul class="NOSOTROS">
        <li><a href="">NOSOTROS</a>
            <ul>
                <li><a href="https://www.cisnechevrolet.com.pe/quienes-somos">QUIÉNES SOMOS</a></li>
                <li><a href="https://www.cisnechevrolet.com.pe/sucursales">SUCURSALES</a></li>
                <li><a
                        href="https://www.youtube.com/watch?v=JcJy8sVLrXs&pp=ygUbcmVncmVzYSBwZXJyYSBwb3JxdWUgdGUgdmFz">CONTACTANOS</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="Servicios">
        <li><a href="">SERVICIOS</a>
            <ul>
                <li><a href="mantenimiento.php?id=<?php echo $cliente_id; ?>" class="servicio-link">AGENDA TU
                        MANTENIMIENTO</a></li>
                <li><a href="servicioinfo.php?id=<?php echo $cliente_id; ?>" class="servicio-link">PROGRAMA TU
                        SERVICIO</a></li>
                <li><a href="repuestos.php?id=<?php echo $cliente_id; ?>">COMPRA DE
                        REPUESTOS</a></li>
                <li><a href="repuestos2.php?id=<?php echo $cliente_id; ?>" class="servicio-link">TUS REPUESTOS</a>
                </li>
            </ul>
        </li>
    </ul>


    <ul class="FINANCIAMIENTO">
        <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">FINANCIAMIENTO</a>
        </li>
    </ul>

    <a href="login.php" class="enlace-InicioSesion">
        <img src="/imagenes/iconoLogin1.png">
    </a>


    <a href="https://www.facebook.com/chevrolet.cisne/" class="enlace-facebook">
        <img src="/imagenes/logoface.png" alt="logoface">
    </a>

    <a href="https://www.instagram.com/automotrizcisnechevrolet/" class="enlace-instagram">
        <img src="/imagenes/logoinsta.png" alt="logoinsta">
    </a>

    <a href="https://www.youtube.com/channel/UCPd1pl1FiyZApa6-j8Z1S1A" class="enlace-youtube">
        <img src="/imagenes/logoyoutu.png" alt="logoyoutu">
    </a>

    <a href="https://www.linkedin.com/company/automotrizcisne/" class="enlace-linkedin">
        <img src="/imagenes/logolinkedin.png" alt="logolinke">
    </a>

    <a href="#" class="enlace-whatsapp">
        <img src="/imagenes/logowats.png" style="left: 985px;" alt="logowats">
        <span class="tooltip">
            <p><strong>WhatsApp</strong></p>
            <p>¡HABLA CON NUESTRO EQUIPO POR WHATSAPP!</p>
            <table>
                <tr>
                    <td><a href="https://wa.me/959929698">959929698</a></td>
                    <td>VENTAS</td>
                </tr>
                <tr>
                    <td><a href="https://wa.me/954747287">954747287</a></td>
                    <td>TALLER</td>
                </tr>
                <tr>
                    <td><a href="https://wa.me/950586379">950586379</a></td>
                    <td>REPUESTOS</td>
                </tr>
            </table>
        </span>
    </a>



</header>


<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="color: #a68e1d;">Programa tu mantenimiento</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="nombre" class="form-label" style="color: #a68e1d;">Nombre del propietario
                                    del vehículo</label>
                                <input type="text" class="form-control" id="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label" style="color: #a68e1d;">Número de
                                    teléfono</label>
                                <input type="tel" class="form-control" id="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="marca-modelo" class="form-label" style="color: #a68e1d;">Marca y modelo del
                                    vehículo</label>
                                <input type="text" class="form-control" id="marca-modelo" required>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label" style="color: #a68e1d;">Número de placa o
                                    matrícula</label>
                                <input type="text" class="form-control" id="placa" required>
                            </div>
                            <div class="mb-3">
                                <label for="kilometraje" class="form-label" style="color: #a68e1d;">Kilometraje
                                    actual</label>
                                <input type="number" class="form-control" id="kilometraje" required>
                            </div>
                            <div class="mb-3 input-group datetimepicker-container">
                                <label for="fecha-hora" class="form-label" style="color: #a68e1d;">Fecha y hora
                                    preferidas para el servicio:</label>
                                <input type="text" class="form-control datetimepicker date-picker" id="fecha"
                                    placeholder="00/00/0000" required>
                                <input type="text" class="form-control datetimepicker time-picker" id="hora"
                                    placeholder="00:00" required>
                                <button type="button" class="btn btn-outline-secondary input-group-text"
                                    id="datetimepicker-btn">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </div>
                            <a href="/imagenes/constancia_mantenimiento.pdf" target="_blank">
                                <button type="button" class="btn-primary">Enviar</button>
                            </a>
                        </form>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="/imagenes/calendario.jpeg" alt="Mantenimiento" class="img-fluid"
                            style="margin-left: 120px">
                        <p class="mensaje-aviso mt-3">OJO: Todo mantenimiento programado tiene que realizarse pasado los
                            7 días hábiles de la fecha programada</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/7.0.0/css/tempusdominus-bootstrap-4.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/7.0.0/js/tempusdominus-bootstrap-4.min.js"></script>



    <script src="mantenimiento.js"></script>

</body>

</html>