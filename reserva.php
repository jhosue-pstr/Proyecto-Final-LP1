
<html>

<head>
    <title>Automotriz Cisne | Concesionario Chevrolet</title>
    <link rel="shortcut icon" type="image/" href="imagenes/minilogo.jpeg">
    <link rel="stylesheet" href="reserva.css">
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
    

<div class="image-container">
    <img src="/imagenes/auto2hd.jpg" alt="Descripción de la imagen" class="auto2" id="car-image">
</div>




<div class="COLORES" style="position: absolute; top: 590px; left: 160px;">
        <p>Colores:</p>
        <div class="color-buttons">
            <div class="color-button1" onclick="changeImage('/imagenes/auto2hd.jpg')"></div>
            <div class="color-button2" onclick="changeImage('/imagenes/auto2.1.jpg')"></div>
            <div class="color-button3" onclick="changeImage('/imagenes/auto2.2.jpg')"></div>
            <div class="color-button4" onclick="changeImage('/imagenes/auto2.3.jpg')"></div>
            <div class="color-button5" onclick="changeImage('/imagenes/auto2.4.jpg')"></div>
        </div>
</div>




<div class="form-container">
        <form>
            
            <label for="nombres">Nombres*</label>
            <input type="text" id="nombres" name="nombres" placeholder="Ingrese sus Nombres" required>

            <label for="apellidos">Apellidos*</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese sus Apellidos" required>

            <label for="telefono">Teléfono*</label>
            <input type="tel" id="telefono" name="telefono" placeholder="332332332" required>

            <label for="email">Dirección*</label>
            <input type="email" id="direccion" name="direccion" placeholder="Jr. Aca nomas" required>


        </form>
</div>











    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


















    <div class="tarjeta-section">
        <span>Tarjeta: </span>
        <div id="banco-buttons">
            <button class="action-button" onclick="openModal('bbva')">BBVA</button>
            <button class="action-button" onclick="openModal('bcp')">BCP</button>
            <button class="action-button" onclick="openModal('interbank')">INTERBANK</button>
        </div>
        <img id="imagen-bancos" src="/imagenes/aspa.png" alt="Imagen de bancos" style="display: none;">
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
        <button class="botoncopia" onclick="window.location.href = 'comprobante.php';">Haz tu reserva ya!!</button>
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




    <script src="modal.js"></script>
</body>
