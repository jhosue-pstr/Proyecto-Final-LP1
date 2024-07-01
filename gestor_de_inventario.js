$(document).ready(function () {
    $.ajax({
        url: 'gestor_de_inventario.php',
        type: 'GET',
        dataType: 'json',
        data: { type: 'repuestos' }, 
        success: function (data) {
            let repuestosTable = $('#inventoryTable2');
            repuestosTable.empty();

            if (data.length === 0) {
                console.warn('No se encontraron datos de repuestos en la base de datos.');
            }

            data.forEach(function (repuesto) {
                let row = `<tr>
                    <td>${repuesto.rp_marca} ${repuesto.rp_modelo}</td>
                    <td>${repuesto.rp_estado}</td>
                    <td>${repuesto.rp_precio_base}</td>
                    <td>${repuesto.rp_nombre}</td>
                    <td>${repuesto.cantidad_disponible}</td>
                    <td><button class="btn btn-sm btn-info btn-details">Detalles</button></td>


                </tr>`;
                repuestosTable.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de repuestos:', error);
            console.error('Estado:', status);
            console.error('XHR:', xhr);
        }
    });
});




$(document).ready(function () {
   
    $.ajax({
        url: 'gestor_de_inventario.php',
        type: 'GET',
        dataType: 'json',
        data: { type: 'vehiculos' },
        success: function (data) {
            let inventoryTable = $('#inventoryTable');
            inventoryTable.empty();

            if (data.length === 0) {
                console.warn('No se encontraron datos de vehículos en la base de datos.');
            }

            data.forEach(function (vehiculo) {
                let row = `<tr>
                    <td>${vehiculo.vh_marca} ${vehiculo.vh_modelo}</td>
                    <td>${vehiculo.vh_color}</td>
                    <td>${vehiculo.vh_precio}</td>
                    <td>${vehiculo.cantidad_disponible}</td>
                    <td><button class="btn btn-sm btn-info">Detalles</button></td>
                </tr>`;
                inventoryTable.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de vehículos:', error);
            console.error('Estado:', status);
            console.error('XHR:', xhr);
        }
    });
});







$(document).ready(function () {
    function filterTable() {
        let searchValue = $('#searchInput').val().toLowerCase();
        let categoryValue = $('#categoryFilter').val().toLowerCase();
        let colorValue = $('#colorFilter').val().toLowerCase();

        $('#inventoryTable tr').filter(function () {
            let rowText = $(this).text().toLowerCase();
            let categoryMatch = categoryValue === '' || rowText.includes(categoryValue);
            let colorMatch = colorValue === '' || rowText.includes(colorValue);
            let searchMatch = rowText.includes(searchValue);

            $(this).toggle(categoryMatch && colorMatch && searchMatch);
        });
    }

    $('#searchInput, #categoryFilter, #colorFilter').on('keyup change', function () {
        filterTable();
    });

    $.ajax({
        url: 'gestor_de_inventario.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            let inventoryTable = $('#inventoryTable');
            inventoryTable.empty(); 

            if (data.length === 0) {
                console.warn('No se encontraron datos en la base de datos.');
            }

            data.forEach(function (vehiculo) {
                let row = `<tr>
                    <td>${vehiculo.vh_marca} ${vehiculo.vh_modelo}</td>
                    <td>${vehiculo.vh_color}</td>
                    <td>${vehiculo.vh_precio}</td>
                    <td>${vehiculo.cantidad_disponible}</td>
                    <td><button class="btn btn-sm btn-info">Detalles</button></td>
                </tr>`;
                inventoryTable.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos del inventario:', error);
            console.error('Estado:', status);
            console.error('XHR:', xhr);
        }
    });
});







$(document).ready(function () {
   
    function filterTable() {
        let searchValue = $('#searchInput1').val().toLowerCase();
        let categoryValue = $('#categoryFilter1').val().toLowerCase();
        let colorValue = $('#colorFilter1').val().toLowerCase();

        $('#inventoryTable2 tr').each(function () {
            let rowText = $(this).text().toLowerCase();
            let categoryMatch = categoryValue === '' || rowText.includes(categoryValue);
            let colorMatch = colorValue === '' || rowText.includes(colorValue);
            let searchMatch = rowText.includes(searchValue);

            $(this).toggle(categoryMatch && colorMatch && searchMatch);
        });
    }

    $('#searchInput1, #categoryFilter1, #colorFilter1').on('keyup change', function () {
        filterTable();
    });

    $.ajax({
        url: 'gestor_de_inventario.php',
        type: 'GET',
        dataType: 'json',
        data: { type: 'repuestos' }, 
        success: function (data) {
            let inventoryTable = $('#inventoryTable2');
            inventoryTable.empty(); 

            if (data.length === 0) {
                console.warn('No se encontraron datos de repuestos en la base de datos.');
            }

            data.forEach(function (repuesto) {
                let row = `<tr>
                    <td>${repuesto.rp_marca} ${repuesto.rp_modelo}</td>
                    <td>${repuesto.rp_estado}</td>
                    <td>${repuesto.rp_precio_base}</td>
                    <td>${repuesto.rp_nombre}</td>
                    <td>${repuesto.cantidad_disponible}</td>
                    <td><button class="btn btn-sm btn-info">Detalles</button></td>
                </tr>`;
                inventoryTable.append(row);
            });

            filterTable();
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de repuestos:', error);
            console.error('Estado:', status);
            console.error('XHR:', xhr);
        }
    });
});









