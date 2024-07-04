<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $cliente_id = $_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
        $buscar = $_GET['buscar'];

        $sql = "SELECT * FROM repuesto WHERE rp_nombre LIKE '%$buscar%'";
        $result = $conn->query($sql);
    } else {
        $sql = "SELECT * FROM repuesto";
        $result = $conn->query($sql);
    }
}
?>
<html>


<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="repuestos.css">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputBusqueda = document.getElementById('buscarInput');
        const productos = document.querySelectorAll('.producto');

        inputBusqueda.addEventListener('input', function () {
            const valorBusqueda = inputBusqueda.value.trim().toLowerCase();

            productos.forEach(producto => {
                const nombreProducto = producto.getAttribute('data-nombre').toLowerCase();
                const contieneTexto = nombreProducto.includes(valorBusqueda);

                if (contieneTexto) {
                    producto.style.display = 'block';
                } else {
                    producto.style.display = 'none';
                }
            });
        });
    });
</script>

<body>
    <div class="container">
        <h1 class="my-4">Lista de Repuestos</h1>
        <form id="searchForm" class="mb-4">
            <div class="input-group">
                <input id="buscarInput" type="text" class="form-control" placeholder="Buscar repuesto por nombre"
                    name="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
                <div class="input-group-append">
                    <button id="buscarBtn" class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        <div id="resultadoBusqueda" class="row">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-4 producto" data-nombre="<?php echo strtolower($row['rp_nombre']); ?>">
                        <div class="card border border-warning h-100">
                            <img src="<?php echo $row['rp_imagen']; ?>" class="card-img-top"
                                alt="<?php echo $row['rp_nombre']; ?>" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h5 class="card-title"><?php echo $row['rp_nombre']; ?></h5>
                                <p class="card-text"><strong>Precio:</strong>
                                    $<?php echo number_format($row['rp_precio_base'], 2); ?></p>
                                <p class="card-text"><strong>Estado:</strong> <?php echo $row['rp_estado']; ?></p>
                                <a href="repuestoinfo.php?id=<?php echo $row['rp_id']; ?>&cliente_id=<?php echo $cliente_id; ?>"
                                    class="btn btn-warning" style="text-decoration: none;">
                                    Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No se encontraron repuestos.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

</body>

</html>