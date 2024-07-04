<?php
session_start();

if (isset($_GET['repuesto_id'], $_GET['cliente_id'], $_GET['nombre_cliente'], $_GET['email_cliente'], $_GET['telefono_cliente'], $_GET['direccion_cliente'])) {
    $repuesto_id = $_GET['repuesto_id'];
    $cliente_id = $_GET['cliente_id'];
    $nombre_cliente = urldecode($_GET['nombre_cliente']);
    $email_cliente = urldecode($_GET['email_cliente']);
    $telefono_cliente = urldecode($_GET['telefono_cliente']);
    $direccion_cliente = urldecode($_GET['direccion_cliente']);

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

    $sql_cliente = "SELECT * FROM cliente WHERE cl_id = $cliente_id";
    $result_cliente = $conn->query($sql_cliente);

    if ($result_repuesto->num_rows > 0 && $result_cliente->num_rows > 0) {
        $row_repuesto = $result_repuesto->fetch_assoc();
        $nombre_repuesto = $row_repuesto['rp_nombre'];
        $precio_repuesto = $row_repuesto['rp_precio_base'];
        $estado_repuesto = $row_repuesto['rp_estado'];
        $marca_repuesto = $row_repuesto['rp_marca'];
        $modelo_repuesto = $row_repuesto['rp_modelo'];
        $codigo_repuesto = $row_repuesto['rp_codigo'];
        $descripcion_repuesto = $row_repuesto['rp_descripcion'];
        $imagen_repuesto = $row_repuesto['rp_imagen'];
        $row_cliente = $result_cliente->fetch_assoc();
        $nombre_cliente_db = $row_cliente['cl_nombre'];
        $direccion_cliente_db = $row_cliente['cl_direccion'];




    } else {
        echo "No se encontró el repuesto o el cliente.";
    }

    $conn->close();

} else {
    echo "Error: Faltan parámetros para procesar la compra.";
}
?>


<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="repuestocompra.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
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
                    <img src="<?php echo $imagen_repuesto; ?>" class="card-img-top"
                        alt="<?php echo $nombre_repuesto; ?>" style="height: 500px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre_repuesto; ?></h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="card-text">Marca: <?php echo $marca_repuesto; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text">Modelo: <?php echo $modelo_repuesto; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text">Código: <?php echo $codigo_repuesto; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text">Estado: <?php echo $estado_repuesto; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text">Precio: $<?php echo $precio_repuesto; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <form action="procesar_compra.php" method="POST">
                    <input type="hidden" name="repuesto_id" value="<?php echo $repuesto_id; ?>">
                    <div class="form-group">
                        <label for="nombre_cliente">Nombre:</label>
                        <p><strong><?php echo $nombre_cliente; ?></strong></p>
                        <input type="hidden" class="form-control" id="nombre_cliente" name="nombre_cliente"
                            value="<?php echo htmlspecialchars($nombre_cliente); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email_cliente">Email:</label>
                        <p><strong><?php echo $email_cliente; ?></strong></p>
                        <input type="hidden" class="form-control" id="email_cliente" name="email_cliente"
                            value="<?php echo htmlspecialchars($email_cliente); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono_cliente">Teléfono:</label>
                        <p><strong><?php echo $telefono_cliente; ?></strong></p>
                        <input type="hidden" class="form-control" id="telefono_cliente" name="telefono_cliente"
                            value="<?php echo htmlspecialchars($telefono_cliente); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion_cliente">Dirección de Envío:</label>
                        <textarea class="form-control" id="direccion_cliente" name="direccion_cliente" rows="3"
                            required><?php echo htmlspecialchars($direccion_cliente); ?></textarea>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <span style="margin-bottom: 10px;">Tarjeta: </span>
                            <div id="banco-buttons">
                                <button class="action-button btn btn-warning" onclick="openModal('bbva')">BBVA</button>
                                <button class="action-button btn btn-warning" onclick="openModal('bcp')">BCP</button>
                                <button class="action-button btn btn-warning"
                                    onclick="openModal('interbank')">INTERBANK</button>
                            </div>
                            <img id="imagen-bancos" src="/imagenes/aspa.png" alt="Imagen de bancos"
                                style="display: none;">
                        </div>
                    </div>







                    <div id="modal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>DATOS DE LA TARJETA</h2>
                            <form id="card-form">
                                <label for="card-holder">Titular De La Tarjeta:</label>
                                <input type="text" id="card-holder" name="card-holder" required>

                                <label for="card-number">Numero De La Tarjeta:</label>
                                <input type="text" id="card-number" name="card-number" required>

                                <label for="expiry-date">Fecha De Vencimiento:</label>
                                <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/AA" required>

                                <label for="security-code">Codigo De Seguridad:</label>
                                <input type="text" id="security-code" name="security-code" maxlength="3" required>

                                <div class="modal-buttons">
                                    <button type="submit" id="save-button">Guardar</button>
                                    <button type="button" id="cancel-button">Cancelar</button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div>
                        <button class="botoncopia" onclick="window.location.href = 'comprobante.php';">Haz tu
                            reserva ya!!</button>
                    </div>

                    <div id="reservation-modal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>RESERVA EXITOSA</h2>
                            <div class="modal-buttons">
                                <button id="receipt-button" onclick="openReceipt()">Comprobante</button>
                            </div>
                            <div class="images-section">
                                <img src="/imagenes/descarga.png" alt="Imagen 1" class="reservation-image">
                                <img src="/imagenes/ojo.jpeg" alt="Imagen 2" class="reservation-image">
                            </div>
                        </div>
                    </div>


            </div>





            </form>
        </div>
    </div>
    </div>



</body>

<script src="modal.js"></script>
<script>
    function changeImage(src) {
        document.getElementById('car-image').src = src;
    }

    var modal = document.getElementById("modal");
    var buttons = document.querySelectorAll(".action-button");
    var span = document.querySelector(".close");
    var cancelButton = document.getElementById("cancel-button");
    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            modal.style.display = "block";
        });
    });
    span.onclick = function () {
        modal.style.display = "none";
    }

    cancelButton.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }











    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modal');
        const cardForm = document.getElementById('card-form');
        const saveButton = document.getElementById('save-button');
        const cancelButton = document.getElementById('cancel-button');
        const bancoButtons = document.getElementById('banco-buttons');
        const imagenBancos = document.getElementById('imagen-bancos');

        saveButton.addEventListener('click', function (event) {
            event.preventDefault();
            if (cardForm.checkValidity()) {
                bancoButtons.style.display = 'none';

                imagenBancos.style.display = 'block';

                var botonCopia = document.querySelector('.botoncopia');
                botonCopia.style.display = 'inline-block';
            }
        });

        cancelButton.addEventListener('click', function () {
            bancoButtons.style.display = 'flex';
            imagenBancos.style.display = 'none';

        });





        const close = document.getElementsByClassName('close')[0];
        close.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    });



    function openReservationModal() {
        var reservationModal = document.getElementById("reservation-modal");
        reservationModal.style.display = "block";
    }

    function openReceipt() {
        window.open('ruta/a/tu/comprobante.pdf', '_blank');
    }

    var reservationModal = document.getElementById("reservation-modal");
    var closeReservation = reservationModal.querySelector(".close");

    closeReservation.onclick = function () {
        reservationModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == reservationModal) {
            reservationModal.style.display = "none";
        }
    }

    var modal = document.getElementById("modal");
    var buttons = document.querySelectorAll(".action-button");
    var span = document.querySelector(".close");
    var cancelButton = document.getElementById("cancel-button");

    function openModal(bank) {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    cancelButton.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>

</html>