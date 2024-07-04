<html>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $repuesto_id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_cisne";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_repuesto = "SELECT * FROM repuesto WHERE rp_id = $repuesto_id";
    $result_repuesto = $conn->query($sql_repuesto);

    if ($result_repuesto->num_rows > 0) {
        $row_repuesto = $result_repuesto->fetch_assoc();

        $nombre = $row_repuesto['rp_nombre'];
        $precio = $row_repuesto['rp_precio_base'];
        $estado = $row_repuesto['rp_estado'];
        $imagen = $row_repuesto['rp_imagen'];
        $descripcion = $row_repuesto['rp_descripcion'];
        $marca = $row_repuesto['rp_marca'];
        $modelo = $row_repuesto['rp_modelo'];
        $codigo = $row_repuesto['rp_codigo'];
    } else {
        echo "No se encontró el repuesto.";
        exit;
    }

    if (isset($_GET['cliente_id']) && !empty($_GET['cliente_id'])) {
        $cliente_id = $_GET['cliente_id'];

        $sql_cliente = "SELECT * FROM cliente WHERE cl_id = $cliente_id";
        $result_cliente = $conn->query($sql_cliente);

        if ($result_cliente->num_rows > 0) {
            $row_cliente = $result_cliente->fetch_assoc();

            $nombre_cliente = $row_cliente['cl_nombre'];
            $email_cliente = $row_cliente['cl_correo'];
            $telefono_cliente = $row_cliente['cl_celular'];
            $direccion_cliente = $row_cliente['cl_direccion'];
        } else {
            echo "No se encontró el cliente.";
            exit;
        }
    } else {
        echo "No se especificó un ID de cliente.";
        exit;
    }

    $conn->close();
} else {
    echo "No se especificó un ID de repuesto.";
    exit;
}
?>


<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="repuestoinfo.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<header>

    <div class="logo"><a href="index.php"><img src="imagenes/logo.jpeg"></a></div>

    <ul class="VEHÍCULOS">
        <li><a href="">VEHÍCULOS</a>
            <ul>
                <li><a href="vehiculos.php">TODOS LOS MODELOS</a></li>
                <li><a href="vehiculos.php">AUTOS</a></li>
                <li><a href="vehiculos.php">CAMIONETAS</a></li>
                <li><a href="vehiculos.php">PICK-UPS</a></li>
                <li><a href="vehiculos.php">COMERCIALES</a></li>
            </ul>
        </li>
    </ul>

    <ul class="POSVENTA">
        <li><a href="">POSVENTA</a>
            <ul>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">EXPERIENCIA CHEVROLET PREMIUM</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">SERVICIOS</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">REPUESTOS</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">GARANTIA CHEVROLET</a></li>
            </ul>
        </li>
    </ul>

    <ul class="OFERTAS">
        <li><a href="">OFERTAS</a>
            <ul>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">TODAS LAS OFERTAS</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">OFERTA DE NUEVOS VEHÍCULOS</a></li>
            </ul>
        </li>
    </ul>

    <ul class="NOSOTROS">
        <li><a href="">NOSOTROS</a>
            <ul>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">QUIÉNES SOMOS</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">SUCURSALES</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">CONTACTANOS</a></li>
            </ul>
        </li>
    </ul>
    <ul class="Servicios">
        <li><a href="">SERVICIOS</a>
            <ul>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="servicio-link">AGENDA TU
                        MANTENIMIENTO</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="servicio-link">PROGRAMA TU
                        SERVICIO</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="servicio-link">COMPRA DE
                        REPUESTOS</a></li>
                <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="servicio-link">TUS REPUESTOS</a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="FINANCIAMIENTO">
        <li><a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0">FINANCIAMIENTO</a>
        </li>
    </ul>

    <a href="login.php" class="enlace-InicioSesion">
        <img src="imagenes/iconoLogin1.png">
    </a>


    <a href="https://www.facebook.com/chevrolet.cisne/" class="enlace-facebook">
        <img src="imagenes/logoface.png" alt="logoface">
    </a>

    <a href="https://www.instagram.com/automotrizcisnechevrolet/" class="enlace-instagram">
        <img src="imagenes/logoinsta.png" alt="logoinsta">
    </a>

    <a href="https://www.youtube.com/channel/UCPd1pl1FiyZApa6-j8Z1S1A" class="enlace-youtube">
        <img src="imagenes/logoyoutu.png" alt="logoyoutu">
    </a>

    <a href="https://www.linkedin.com/company/automotrizcisne/" class="enlace-linkedin">
        <img src="imagenes/logolinkedin.png" alt="logolinke">
    </a>

    <a href="#" class="enlace-whatsapp">
        <img src="imagenes/logowats.png" style="left: 985px;" alt="logowats">
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


    <div class="container">
        <h1 class="my-4">Detalles del Repuesto</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card border border-warning h-100">
                    <img src="<?php echo $imagen; ?>" class="card-img-top" alt="<?php echo $nombre; ?>"
                        style="height: 500px; object-fit: cover;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title"><?php echo $nombre; ?></h5>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text"><strong>Precio:</strong> $<?php echo number_format($precio, 2); ?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text"><strong>Estado:</strong> <?php echo $estado; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text"><strong>Marca:</strong> <?php echo $marca; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text"><strong>Modelo:</strong> <?php echo $modelo; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text"><strong>Código:</strong> <?php echo $codigo; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="card-text" style="font-size: 50px;"><strong>Descripción:</strong></p>
                <p style="font-size: 30px;"><?php echo $descripcion; ?></p>
                <a href="repuestocompra.php?repuesto_id=<?php echo $repuesto_id; ?>&cliente_id=<?php echo $cliente_id; ?>&nombre_cliente=<?php echo urlencode($nombre_cliente); ?>&email_cliente=<?php echo urlencode($email_cliente); ?>&telefono_cliente=<?php echo urlencode($telefono_cliente); ?>&direccion_cliente=<?php echo urlencode($direccion_cliente); ?>"
                    class="btn btn-primary">Comprar Repuesto</a>


                <a href="repuestos.php" class="btn btn-secondary">Volver a la Lista</a>
            </div>
        </div>
    </div>

</body>

</html>