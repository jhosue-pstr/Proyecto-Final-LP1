<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_cisne";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die(json_encode(array('error' => 'Error de conexión: ' . $conexion->connect_error)));
}

$query = "SELECT c.id, s.sr_nombre, s.sr_fecha_y_hora as fecha, s.sr_descripcion 
          FROM calendario c 
          JOIN servicio s ON c.sr_id = s.sr_id";

$result = $conexion->query($query);

if (!$result) {
    die(json_encode(array('error' => 'Error en la consulta: ' . $conexion->error)));
}

$eventos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convertir la fecha de YYYY-MM-DD a MMMM/DD/YYYY
        $date = DateTime::createFromFormat('Y-m-d', $row['fecha']);
        $formattedDate = $date->format('F/j/Y'); // Cambiar formato a "January/1/2020"

        $eventos[] = array(
            'id' => $row['id'],
            'name' => $row['sr_nombre'],
            'date' => $formattedDate,
            'type' => 'event',
            'everyYear' => false
        );
    }
}

// Devolver los eventos en formato JSON
header('Content-Type: application/json');
echo json_encode($eventos);

$conexion->close();
?>