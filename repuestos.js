document.addEventListener('DOMContentLoaded', function() {
    const inputBusqueda = document.querySelector('.barra-busqueda input[type="text"]');
    const productos = document.querySelectorAll('.producto');

    inputBusqueda.addEventListener('input', function() {
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
