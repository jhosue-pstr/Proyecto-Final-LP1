<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cisne";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql_ventas_vehiculo = "SELECT vtv_id AS id, vtv_serie AS serie, vtv_numero AS numero, vtv_fecha AS fecha, vtv_igv_total AS igv_total, vtv_valor_venta_total AS valor_venta_total, vtv_importe_total AS importe_total, v.vh_modelo AS modelo, v.vh_color AS color
                        FROM ventas_de_vehiculo vtv
                        INNER JOIN vehiculo v ON vtv.vtv_vh_id = v.vh_id";
$result_ventas_vehiculo = $conn->query($sql_ventas_vehiculo);

$ventas_vehiculo = [];
if ($result_ventas_vehiculo->num_rows > 0) {
    while ($row = $result_ventas_vehiculo->fetch_assoc()) {
        $filtered_row = [
            "id" => $row['id'],
            "modelo" => $row['modelo'],
            "color" => $row['color'],
            "precio" => $row['valor_venta_total']
        ];
        $ventas_vehiculo[] = $filtered_row;
    }
}


$sql_venta_servicio = "SELECT vts_id AS id, vts_serie AS serie, vts_numero AS numero, vts_fecha AS fecha, vts_igv_total AS igv_total, vts_valor_venta_total AS valor_venta_total, vts_importe_total AS importe_total FROM venta_de_servicio";
$result_venta_servicio = $conn->query($sql_venta_servicio);

$venta_servicio = [];
if ($result_venta_servicio->num_rows > 0) {
    while ($row = $result_venta_servicio->fetch_assoc()) {
        $filtered_row = [
            "id" => $row['id'],
            "descripcion" => $row['serie'] . ' ' . $row['numero'],
            "precio" => $row['valor_venta_total']
        ];
        $venta_servicio[] = $filtered_row;
    }
}




$sql_ventas_repuestos = "SELECT vtr_id AS id, CONCAT(vtr_serie, ' ', vtr_numero) AS descripcion, vtr_numero AS codigo, vtr_valor_venta_total AS precio
                        FROM ventas_de_repuestos";

$result_ventas_repuestos = $conn->query($sql_ventas_repuestos);

$ventas_repuestos = [];
if ($result_ventas_repuestos->num_rows > 0) {
    while ($row = $result_ventas_repuestos->fetch_assoc()) {
        $filtered_row = [
            "id" => $row['id'],
            "descripcion" => $row['descripcion'],
            "codigo" => $row['codigo'],
            "precio" => $row['precio']
        ];
        $ventas_repuestos[] = $filtered_row;
    }
}

$conn->close();

$response = [
    "ventas_vehiculo" => $ventas_vehiculo,
    "venta_servicio" => $venta_servicio,
    "ventas_repuestos" => $ventas_repuestos,
];

header("Content-Type: application/json");
echo json_encode($response);
?>