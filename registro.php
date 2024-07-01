<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_cisne";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $documento = $_POST['documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];


    $sql = "INSERT INTO cliente (cl_dni, cl_nombre, cl_direccion, cl_correo, cl_celular, cl_usuario, cl_contraseña)
            VALUES ('$documento', '$nombres', '$apellidos', '$email', '$telefono', '$email', '$contraseña')";

    if ($conn->query($sql) === TRUE) {

        header("Location: login.php");
        exit;
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>