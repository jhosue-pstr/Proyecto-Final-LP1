<?php
session_start();

// Verificar inicio de sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$correo = $_SESSION['usuario'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_cisne";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$nombre = "";
$cargo = "";
$vehiculos = array();
$reportes = array();
$historial_servicios = array();
$historial_vehiculos = array();

// Obtener nombre y cargo del usuario
$sql_empleado = "SELECT em_nombre, em_cargo FROM empleado WHERE em_correo = ?";
$stmt_empleado = $conn->prepare($sql_empleado);
$stmt_empleado->bind_param("s", $correo);
$stmt_empleado->execute();
$result_empleado = $stmt_empleado->get_result();

if ($result_empleado->num_rows > 0) {
    $row_empleado = $result_empleado->fetch_assoc();
    $nombre = $row_empleado['em_nombre'];
    $cargo = $row_empleado['em_cargo'];
}

$stmt_empleado->close();

// Si el nombre está vacío, es un cliente
if (empty($nombre)) {
    $sql_cliente = "SELECT cl_nombre FROM cliente WHERE cl_correo = ?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    $stmt_cliente->bind_param("s", $correo);
    $stmt_cliente->execute();
    $result_cliente = $stmt_cliente->get_result();

    if ($result_cliente->num_rows > 0) {
        $row_cliente = $result_cliente->fetch_assoc();
        $nombre = $row_cliente['cl_nombre'];
    }

    $stmt_cliente->close();
}

// Consulta de vehículos
$sql_vehiculos = "SELECT vh_id, vh_marca, vh_modelo, vh_año, vh_color, vh_precio, IFNULL(stock.cantidad_disponible, 0) AS cantidad_disponible
                  FROM vehiculo
                  LEFT JOIN stock ON vehiculo.vh_id = stock.elemento_id AND stock.tipo_elemento = 'vehiculo'";
$result_vehiculos = $conn->query($sql_vehiculos);

if ($result_vehiculos->num_rows > 0) {
    while ($row_vehiculo = $result_vehiculos->fetch_assoc()) {
        $vehiculos[] = $row_vehiculo;
    }
} else {
    echo "No se encontraron vehículos.";
}

// Consulta de reportes
$sql_reportes = "SELECT re_id, re_descripcion, empleado.em_nombre AS usuario 
                 FROM reporte 
                 JOIN empleado ON reporte.em_id = empleado.em_id";
$result_reportes = $conn->query($sql_reportes);

if ($result_reportes) {
    while ($row_reporte = $result_reportes->fetch_assoc()) {
        $reportes[] = $row_reporte;
    }
    $result_reportes->free();
} else {
    echo "Error al ejecutar la consulta de reportes: " . $conn->error;
}

// Consulta de historial de servicios
$sql_historial_servicios = "SELECT hs.hvs_id, hs.hvs_fecha_y_hora, hs.hvs_descripcion, 
                            vts.vts_valor_venta_total AS valor_venta_total,
                            empleado.em_nombre AS nombre_empleado, empleado.em_cargo AS cargo_empleado,
                            cliente.cl_nombre AS nombre_cliente, cliente.cl_celular AS celular_cliente
                            FROM historial_de_servicios hs
                            INNER JOIN venta_de_servicio vts ON hs.hvs_vts_id = vts.vts_id
                            INNER JOIN empleado ON vts.vts_em_id = empleado.em_id
                            INNER JOIN cliente ON vts.vts_cl_id = cliente.cl_id";
$result_historial_servicios = $conn->query($sql_historial_servicios);

if ($result_historial_servicios->num_rows > 0) {
    while ($row_servicio = $result_historial_servicios->fetch_assoc()) {
        $historial_servicios[] = $row_servicio;
    }
}

// Consulta de historial de vehículos separados
$sql_historial_vehiculos = "SELECT hv.hp_id, hv.hp_descripcion, 
                            vh.vh_marca, vh.vh_modelo, 
                            c.cl_nombre AS nombre_cliente, c.cl_celular AS celular_cliente,
                            c.cl_correo AS correo_cliente,
                            mp.mp_metodo_pago AS metodo_pago
                            FROM historial_separacion_vehiculos hv
                            INNER JOIN vehiculo vh ON hv.hp_vh_id = vh.vh_id
                            INNER JOIN cliente c ON hv.hp_cl_id = c.cl_id
                            INNER JOIN metodo_de_pago mp ON hv.hp_mp_id = mp.mp_id";
$result_historial_vehiculos = $conn->query($sql_historial_vehiculos);

if ($result_historial_vehiculos->num_rows > 0) {
    while ($row_vehiculo = $result_historial_vehiculos->fetch_assoc()) {
        $historial_vehiculos[] = $row_vehiculo;
    }
} else {
    echo "Error al ejecutar la consulta de historial de vehículos separados: " . $conn->error;
}

// Consulta de empleados con cargo "Asesor de ventas"
$sql = "SELECT em_nombre, em_cargo, em_correo FROM empleado WHERE em_cargo = 'Asesor de ventas'";
$result = $conn->query($sql);

// Array para almacenar los resultados
$empleados = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $empleados[] = $row;
    }
}

$conn->close();

$response = array(
    'nombreUsuario' => htmlspecialchars($nombre),
    'cargoEmpleado' => htmlspecialchars($cargo),
    'vehiculos' => $vehiculos,
    'reportesUsuarios' => $reportes,
    'historialServicios' => $historial_servicios,
    'historialVehiculos' => $historial_vehiculos,
    'empleadosAsesores' => $empleados // Agregar empleados con cargo "Asesor de ventas"
);

// Enviar respuesta JSON
header('Content-Type: application/json');
echo json_encode($response);
?>