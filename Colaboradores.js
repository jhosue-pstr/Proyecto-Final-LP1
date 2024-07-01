document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', // Vista mensual inicial
        events: [
            {
                title: 'Reunión de Equipo',
                start: '2024-07-01',
                end: '2024-07-02',
                description: 'Reunión semanal del equipo de ventas.'
            },
            {
                title: 'Sesión de Formación',
                start: '2024-07-05',
                description: 'Sesión de formación sobre nuevas políticas internas.'
            },
            // Agrega más eventos según sea necesario
        ]
    });
    calendar.render();
});


    document.addEventListener('DOMContentLoaded', function() {
        // Datos de ejemplo para el gráfico (puedes ajustar según tus datos reales)
        var salesData = {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            datasets: [{
                label: 'Ventas Mensuales',
                data: [120, 150, 180, 200, 170], // Datos de ventas por mes
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                borderWidth: 1
            }]
        };

        var salesConfig = {
            type: 'bar', // Tipo de gráfico (barra en este caso)
            data: salesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Comienza en el eje Y desde cero
                    }
                }
            }
        };

        var salesChart = new Chart(document.getElementById('salesPerformance'), salesConfig);
    });

