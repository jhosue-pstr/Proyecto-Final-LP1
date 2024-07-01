<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "
    SELECT
        cp.id,
        c.cl_nombre AS nombre_cliente,
        p.pd_nombre_promocion AS nombre_promocion,
        p.pd_descripcion AS descripcion_promocion,
        p.pd_fecha_inicio AS fecha_inicio,
        p.pd_fecha_fin AS fecha_fin
    FROM
        ClientePromocion cp
    INNER JOIN
        cliente c ON cp.cl_id = c.cl_id
    INNER JOIN
        promociones_y_descuentos p ON cp.pd_id = p.pd_id
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}

$conn->close();

header("Content-Type: application/json");
echo json_encode($data);
?>