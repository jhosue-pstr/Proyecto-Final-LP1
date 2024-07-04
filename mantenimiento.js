// Ejemplo usando flatpickr
document.addEventListener('DOMContentLoaded', function () {
    flatpickr('.date-picker', {
        dateFormat: 'd/m/Y',
        // Configuración adicional si es necesaria
    });

    flatpickr('.time-picker', {
        enableTime: true,
        noCalendar: true,
        dateFormat: 'H:i',
        // Configuración adicional si es necesaria
    });
});

