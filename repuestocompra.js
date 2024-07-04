
// Variables para el modal y sus elementos relacionados
var modal = document.getElementById("modal");
var buttons = document.querySelectorAll(".action-button");
var span = document.querySelector(".close");
var cancelButton = document.getElementById("cancel-button");

// Función para abrir el modal cuando se hace clic en un botón
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        modal.style.display = "block";
    });
});

// Función para cerrar el modal cuando se hace clic en la 'X'
span.onclick = function() {
    modal.style.display = "none";
}

// Función para cerrar el modal cuando se hace clic en Cancelar
cancelButton.onclick = function() {
    modal.style.display = "none";
}

// Función para cerrar el modal haciendo clic fuera de él
window.onclick = function(event) {
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
    const informButton = document.getElementById('inform-button');

    saveButton.addEventListener('click', function (event) {
        event.preventDefault(); // Evita enviar el formulario

        // Verifica si todos los campos están llenos
        if (cardForm.checkValidity()) {
            // Oculta los botones de los bancos
            bancoButtons.style.display = 'none';

            // Muestra la imagen de los bancos
            imagenBancos.style.display = 'block';

            var botonCopia = document.querySelector('.botoncopia');
            botonCopia.style.display = 'inline-block';

            // Muestra el botón de información
            informButton.style.display = 'inline-block';
        }
    });

    cancelButton.addEventListener('click', function () {
        // Restablece la visibilidad de los botones y oculta la imagen
        bancoButtons.style.display = 'flex';
        imagenBancos.style.display = 'none';
        informButton.style.display = 'none';
    });

    // Cierra el modal al hacer clic en la 'X'
    const close = document.getElementsByClassName('close')[0];
    close.addEventListener('click', function () {
        modal.style.display = 'none';
    });
});





// Función para abrir el modal de reserva exitosa























// Función para abrir el modal de reserva exitosa
function openReservationModal() {
    var reservationModal = document.getElementById("reservation-modal");
    reservationModal.style.display = "block";
}

// Función para abrir el archivo de comprobante
function openReceipt() {
    window.open('ruta/a/tu/comprobante.pdf', '_blank'); // Reemplaza 'ruta/a/tu/comprobante.pdf' con la ruta real de tu archivo
}

// Variables para el modal de reserva y sus elementos relacionados
var reservationModal = document.getElementById("reservation-modal");
var closeReservation = reservationModal.querySelector(".close");

// Función para cerrar el modal cuando se hace clic en la 'X'
closeReservation.onclick = function() {
    reservationModal.style.display = "none";
}

// Función para cerrar el modal haciendo clic fuera de él
window.onclick = function(event) {
    if (event.target == reservationModal) {
        reservationModal.style.display = "none";
    }
}

// Variables para el modal y sus elementos relacionados
var modal = document.getElementById("modal");
var buttons = document.querySelectorAll(".action-button");
var span = document.querySelector(".close");
var cancelButton = document.getElementById("cancel-button");

// Función para abrir el modal cuando se hace clic en un botón de acción
function openModal(bank) {
    modal.style.display = "block";
}

// Función para cerrar el modal cuando se hace clic en la 'X'
span.onclick = function() {
    modal.style.display = "none";
}

// Función para cerrar el modal cuando se hace clic en el botón de cancelar
cancelButton.onclick = function() {
    modal.style.display = "none";
}

// Función para cerrar el modal haciendo clic fuera de él
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
