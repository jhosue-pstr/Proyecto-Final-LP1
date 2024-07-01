<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$type = $_GET['type'] ?? '';

if ($type === 'vehiculos') {
    $sql = "SELECT v.*, s.cantidad_disponible
            FROM vehiculo v
            LEFT JOIN stock s ON v.vh_id = s.elemento_id AND s.tipo_elemento = 'vehiculo'";
} elseif ($type === 'repuestos') {
    $sql = "SELECT rp.*, s.cantidad_disponible
            FROM repuesto rp
            LEFT JOIN stock s ON rp.rp_id = s.elemento_id AND s.tipo_elemento = 'repuesto'";
} else {
    die("Tipo de solicitud no válido.");
}

$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>