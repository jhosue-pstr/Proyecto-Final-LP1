<html>


<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $cliente_id = $_GET['id'];

    echo "<h1>Mostrando vehículos para el cliente ID: $cliente_id</h1>";

} else {
    echo "No se especificó un ID de cliente válido.";
}
?>


<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="vehiculos.css">
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

<header>

    <div class="logo"><a href="cliente.php?id=<?php echo $cliente_id; ?>"><img src="/imagenes/logo.jpeg"></a></div>

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
    <body3 onload="mostrarContenido('autos')">
        <div class="encabezado2">
            <div class="container text-center mt-5">
                <div class="row justify-content-center">
                    <div class="col-auto mt-1">
                        <a href="javascript:void(0);" class="custom-button1"
                            onclick="mostrarContenido('autos')">AUTOS</a>
                    </div>
                    <div class="col-auto mt-1">
                        <a href="javascript:void(0);" class="custom-button2"
                            onclick="mostrarContenido('camionetas')">CAMIONETAS</a>
                    </div>
                    <div class="col-auto mt-1">
                        <a href="javascript:void(0);" class="custom-button3"
                            onclick="mostrarContenido('pick-ups')">PICK-UPS</a>
                    </div>
                    <div class="col-auto mt-1">
                        <a href="javascript:void(0);" class="custom-button4"
                            onclick="mostrarContenido('comerciales')">COMERCIAL</a>
                    </div>
                </div>

                <div class="row mt-20" id="contenido">
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="scripts.js"></script>
    </body3>
</body>