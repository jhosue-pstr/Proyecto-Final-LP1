document.addEventListener('DOMContentLoaded', function () {
    const repuestosLink = document.getElementById('repuestos-link');
    const modal2 = document.getElementById('modal2');
    const close2 = document.querySelector('.close2');    
    const carritoImage = repuestosLink.querySelector('.carrito'); // Seleccionamos la imagen dentro del enlace


    // Abrir modal al hacer clic en "TUS REPUESTOS"
    repuestosLink.addEventListener('click', function (event) {
        event.preventDefault(); // Evitar comportamiento por defecto del enlace
        modal2.style.display = 'block';
    });

    // Cerrar modal al hacer clic en la 'X'
    close2.addEventListener('click', function () {
        modal2.style.display = 'none';
    });

    // Cerrar modal al hacer clic fuera de él
    window.addEventListener('click', function (event) {
        if (event.target === modal2) {
            modal2.style.display = 'none';
        }
    });
});



// Función para abrir el modal de reserva exitosa






