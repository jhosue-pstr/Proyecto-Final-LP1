<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>

<body>
    <h2>Registro de Usuario</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nombre">Nombre de usuario:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <input type="submit" name="submit" value="Registrar">
    </form>

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

        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];
        $correo = $_POST['correo'];

        $sql = "INSERT INTO usuarios (nombre, contraseña, correo) VALUES ('$nombre', '$contraseña', '$correo')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>

</html>
