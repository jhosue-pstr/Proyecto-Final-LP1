document.addEventListener('DOMContentLoaded', function() {
    mostrarContenido('autos'); // Muestra AUTOS por defecto al cargar la página
});
function mostrarContenido(opcion) {
    // Limpiar el contenido anterior
    const contenido= document.getElementById('contenido').innerHTML = '';
    if (contenido.innerHTML === '') {
        mostrarModelos();
    }


    // Según la opción seleccionada, mostrar el contenido correspondiente
    switch (opcion) {
        case 'autos':
            mostrarAutos();
            break;
        case 'camionetas':
            mostrarCamionetas();
            break;
        case 'pick-ups':
            mostrarPickups();
            break;
        case 'comerciales':
            mostrarComerciales();
            break;
        default:
            break;
    }
}

function mostrarAutos() {
    const contenido = document.getElementById('contenido');

    // Crear y agregar imágenes con texto para modelos
    contenido.innerHTML = `
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link1" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/auto1.jpg" alt="Modelo 1">
                <p style="font-weight: bold; font-size: 18px; color:#828282">JOY BLACK</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link2" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/auto2.jpg" alt="Modelo 2">
                <p style="font-weight: bold; font-size: 18px; color:#828282">NUEVO SAIL</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link3" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/auto3.jpg" alt="Modelo 3">
                <p style="font-weight: bold; font-size: 18px; color:#828282">ONIX SEDÁN</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link4" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/auto4.jpg" alt="Modelo 4">
                <p style="font-weight: bold; font-size: 18px; color:#828282">ONIX TURBO</p>
            </a>
        </div>
    `;
    setTimeout(() => {
        contenido.querySelectorAll('.imagen-item').forEach(item => {
            item.classList.add('mostrando');
        });
    }, 50);
}



function mostrarCamionetas() {
    const contenido = document.getElementById('contenido');

    // Crear y agregar imágenes con texto para ofertas
    contenido.innerHTML = `
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link1" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta1.jpg" alt="Oferta 1">
                <p style="font-weight: bold; font-size: 18px;color:#828282">GROOVE</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link2" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta2.jpg" alt="Oferta 2">
                <p style="font-weight: bold; font-size: 18px;color:#828282">SPIN</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link3" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta3.jpg" alt="Oferta 3">
                <p style="font-weight: bold; font-size: 18px;color:#828282">TRACKER TURBO</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link4" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta4.jpg" alt="Oferta 4">
                <p style="font-weight: bold; font-size: 18px;color:#828282">NUEVA CAPTIVA XL</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link5" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta5.jpg" alt="Oferta 5">
                <p style="font-weight: bold; font-size: 18px;color:#828282">TRAVERSE</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link6" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta6.jpg" alt="Oferta 6">
                <p style="font-weight: bold; font-size: 18px;color:#828282">TAHOE</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link7" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/camioneta7.jpg" alt="Oferta 7">
                <p style="font-weight: bold; font-size: 18px;color:#828282">SUBURBAN</p>
            </a>
        </div>
    `;
    setTimeout(() => {
        contenido.querySelectorAll('.imagen-item').forEach(item => {
            item.classList.add('mostrando');
        });
    }, 50);
}


function mostrarPickups() {
    const contenido = document.getElementById('contenido');

    // Crear y agregar imágenes con texto para información sobre nosotros
    contenido.innerHTML = `
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link1" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/pickup1.png" alt="Nosotros 1">
                <p style="font-weight: bold; font-size: 18px; color:#828282">NUEVA MONTANA</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link2" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/pickup2.png" alt="Nosotros 2">
                <p style="font-weight: bold; font-size: 18px; color:#828282">COLORADO</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link3" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/pickup3.png" alt="Nosotros 3">
                <p style="font-weight: bold; font-size: 18px; color:#828282">COLORADO Z71</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link4" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/pickup4.png" alt="Nosotros 4">
                <p style="font-weight: bold; font-size: 18px; color:#828282">COLORADO HIGH COUNTY</p>
            </a>
        </div>
    `;
    setTimeout(() => {
        contenido.querySelectorAll('.imagen-item').forEach(item => {
            item.classList.add('mostrando');
        });
    }, 50);
}


function mostrarComerciales() {
    const contenido = document.getElementById('contenido');


    contenido.innerHTML = `
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link1" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/comerciales1.jpg" alt="Financiamiento 1">
                <p style="font-weight: bold; font-size: 18px; color:#828282">N400 MAX</p>
            </a>
        </div>
        <div class="imagen-item">
            <a href="https://www.ejemplo.com/link2" target="_blank" style="text-decoration: none;">
                <img src="/imagenes/comerciales2.jpg" alt="Financiamiento 2">
                <p style="font-weight: bold; font-size: 18px; color:#828282">N400 MOVE</p>
            </a>
        </div>
    `;
    setTimeout(() => {
        contenido.querySelectorAll('.imagen-item').forEach(item => {
            item.classList.add('mostrando');
        });
    }, 50);
}


/* js ventana evergnre */
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.servicio-link');
    const modal = document.querySelector('.ventana-emergente');
    const closeModal = document.querySelector('.ventana-emergente .close');

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const usuarioLogueado = false; 
            if (!usuarioLogueado) {
                modal.style.display = 'block'; 
                closeModal.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                };
            } else {
                window.open(link.href, '_blank'); 
            }
        });
    });
});
