<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $cliente_id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_cisne";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_cliente = "SELECT * FROM cliente WHERE cl_id = $cliente_id";
    $result_cliente = $conn->query($sql_cliente);

    if ($result_cliente->num_rows > 0) {
        $cliente = $result_cliente->fetch_assoc();

        $nombre_cliente = $cliente['cl_nombre'];
        $direccion_cliente = $cliente['cl_direccion'];
        $correo_cliente = $cliente['cl_correo'];
        $celular_cliente = $cliente['cl_celular'];


    } else {
        echo "No se encontró el cliente.";
    }

    $conn->close();
} else {
    echo "No se especificó un ID de cliente válido.";
}
?>




<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="/imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="Pagina1.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="scripts.js" defer></script>


</head>

<body>
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
            <li><a href="repuestos.php">FINANCIAMIENTO</a>
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











    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin-top: 50px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/imagenes/panel1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/panel2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/panel3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/panel4.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/panel5.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<body2>
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-auto">
                <a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="custom-button">TODOS LOS MODELOS</a>
            </div>
            <div class="col-auto">
                <a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="custom-button">TODAS LAS OFERTAS</a>
            </div>
            <div class="col-auto">
                <a href="https://www.youtube.com/watch?v=oZa2Ut8u2S0" class="custom-button">QUIÉNES SOMOS</a>
            </div>
        </div>
    </div>
</body2>




















<body3 onload="mostrarContenido('autos')">
    <div class="encabezado2">
        <div class="container text-center mt-5">
            <div class="row justify-content-center">
                <!-- Primer conjunto de botones -->
                <div class="col-auto mt-1">
                    <a href="javascript:void(0);" class="custom-button2" onclick="mostrarContenido('autos')">AUTOS</a>
                </div>
                <div class="col-auto mt-1">
                    <a href="javascript:void(0);" class="custom-button2"
                        onclick="mostrarContenido('camionetas')">CAMIONETAS</a>
                </div>
                <div class="col-auto mt-1">
                    <a href="javascript:void(0);" class="custom-button2"
                        onclick="mostrarContenido('pick-ups')">PICK-UPS</a>
                </div>
                <div class="col-auto mt-1">
                    <a href="javascript:void(0);" class="custom-button2"
                        onclick="mostrarContenido('comerciales')">COMERCIAL</a>
                </div>
            </div>

            <!-- Contenedor para mostrar imágenes y texto -->
            <div class="row mt-5" id="contenido">
                <!-- Aquí se mostrará el contenido dinámico -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts.js"></script>
</body3>






















<body4>

    <a href="https://www.example.com" target="_blank">
        <img src="/imagenes/imagengrande1.jpeg" alt="imagengrande1">
    </a>

    <div class="image-container">
        <a href="https://www.example.com/1" target="_blank">
            <img src="/imagenes/imagenchiki1.jpeg" alt="imagen1">
        </a>
        <a href="https://www.example.com/2" target="_blank">
            <img src="/imagenes/imagenchiki2.jpeg" alt="imagen2">
        </a>
        <a href="https://www.example.com/3" target="_blank">
            <img src="/imagenes/imagenchiki3.jpeg" alt="imagen3">
        </a>
    </div>




    <div class="container3">
        <div class="info">
            <h1>AUTOMOTRIZ CISNE - JULIACA</h1>
            <p><strong>Dirección:</strong></p>
            <p>Manuel Núñez Butrón F-9 (Lote1y2)</p>
            <p>Urb. Taparachi</p>
            <p>Juliaca</p>
            <p><strong>Teléfono:</strong></p>
            <p>Call Center: 054232741</p>
            <p><strong>Horario de atención Principal:</strong></p>
            <table>
                <tr>
                    <td>DOM</td>
                    <td>LUN</td>
                    <td>MAR</td>
                    <td>MIE</td>
                    <td>JUE</td>
                    <td>VIE</td>
                    <td class="resaltado">SAB</td>
                </tr>
                <tr>
                    <td colspan="7">08:30 - 17:30</td>
                </tr>
            </table>
        </div>
        <div class="mapa">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3844.2950284669655!2d-70.13123728100271!3d-15.522306970312169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9167f40b1659ffc7%3A0x62170133ade5d108!2sAutomotriz%20Cisne%20Chevrolet%20Juliaca!5e0!3m2!1ses-419!2spe!4v1719117626076!5m2!1ses-419!2spe"
                width="1500" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" width="1400" height="600" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
</body4>

<body5>

    <a href="https://www.example.com" target="_blank">
        <img src="/imagenes/imagengrande2.jpeg" alt="imagengrande2">
    </a>

    <div class="encabezado3">
        <a href="https://www.youtube.com/watch?v=7xkuv3j26SU">© 2021 - 2024 Todos los derechos reservados AUTOMOTRIZ
            CISNE S.R.L. // RUC: 20454537743</a>
    </div>











</body5>