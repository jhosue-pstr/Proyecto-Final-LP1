function changeImage(src) {
    document.getElementById('car-image').src = src;
}

var modal = document.getElementById("modal");
var buttons = document.querySelectorAll(".action-button");
var span = document.querySelector(".close");
var cancelButton = document.getElementById("cancel-button");
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        modal.style.display = "block";
    });
});
span.onclick = function() {
    modal.style.display = "none";
}

cancelButton.onclick = function() {
    modal.style.display = "none";
}

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

closeReservation.onclick = function() {
    reservationModal.style.display = "none";
}

window.onclick = function(event) {
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

span.onclick = function() {
    modal.style.display = "none";
}

cancelButton.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
