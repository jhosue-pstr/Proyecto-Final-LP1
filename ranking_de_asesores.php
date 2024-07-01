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

// Consulta SQL para obtener el ranking combinado de empleados por meses
$sql_combinadas = "
    SELECT
        em.em_nombre,
        COALESCE(SUM(vs.vts_valor_venta_total), 0) AS total_ventas_servicio,
        COALESCE(SUM(vr.vtr_valor_venta_total), 0) AS total_ventas_repuestos,
        COALESCE(SUM(vv.vtv_valor_venta_total), 0) AS total_ventas_vehiculos,
        (COALESCE(SUM(vs.vts_valor_venta_total), 0) + COALESCE(SUM(vr.vtr_valor_venta_total), 0) + COALESCE(SUM(vv.vtv_valor_venta_total), 0)) AS total_ventas_combinadas
    FROM
        empleado em
    LEFT JOIN
        venta_de_servicio vs ON em.em_id = vs.vts_em_id
    LEFT JOIN
        ventas_de_repuestos vr ON em.em_id = vr.vtr_em_id
    LEFT JOIN
        ventas_de_vehiculo vv ON em.em_id = vv.vtv_em_id
    GROUP BY
        em.em_nombre
    ORDER BY
        total_ventas_combinadas DESC
";



$result_combinadas = $conn->query($sql_combinadas);

if ($result_combinadas->num_rows > 0) {
    $data = [];
    while ($row = $result_combinadas->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}

$conn->close();

header("Content-Type: application/json");

echo json_encode($data);
?>