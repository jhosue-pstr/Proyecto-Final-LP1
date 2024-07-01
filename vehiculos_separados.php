<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT hv.hp_id, hv.hp_descripcion, hv.hp_codigo, v.vh_marca, c.cl_nombre, mp.mp_metodo_pago
        FROM historial_separacion_vehiculos hv
        JOIN vehiculo v ON hv.hp_vh_id = v.vh_id
        JOIN cliente c ON hv.hp_cl_id = c.cl_id
        JOIN metodo_de_pago mp ON hv.hp_mp_id = mp.mp_id";

$result = $conn->query($sql);

$rows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

echo json_encode($rows);

$conn->close();
?>