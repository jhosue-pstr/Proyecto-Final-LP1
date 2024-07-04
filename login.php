<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card login-card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="font-weight: bold;">INICIAR SESIÓN</h2>
                <div class="logo mt-3">
                    <img src="/imagenes/logologin.png" alt="Imagen de ejemplo" class="logologin1">
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-3">
                        <label for="correo" class="form-label1">Correo electrónico:</label>
                        <input type="email" class="form-control" id="correo" name="correo"
                            placeholder="Ingresa tu correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label2">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingresa tu contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"
                        style="background-color: rgb(180, 159, 35); color: white; border: 2px solid rgb(180, 159, 35);">Iniciar
                        sesión</button>
                </form>
                <div class="text-center mt-3">
                    <p>¿No tienes una cuenta? <a href="registro.html" style="color: rgb(180, 159, 35);">Crear
                            cuenta</a></p>
                </div>
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

                    $correo = $_POST['correo'];
                    $password = $_POST['password'];

                    $sql_cliente = "SELECT * FROM cliente WHERE cl_correo = '$correo' AND cl_contraseña = '$password'";
                    $result_cliente = $conn->query($sql_cliente);

                    if ($result_cliente->num_rows > 0) {
                        $cliente = $result_cliente->fetch_assoc();
                        $cliente_id = $cliente['cl_id'];
                        echo "<div class='alert alert-success mt-3' role='alert'>Inicio de sesión exitoso como cliente</div>";
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['usuario'] = $correo;
                        header("Location: Cliente.php?id=$cliente_id");
                        exit;
                    } else {
                        $sql_empleado = "SELECT * FROM empleado WHERE em_correo = '$correo' AND em_contraseña = '$password'";
                        $result_empleado = $conn->query($sql_empleado);

                        if ($result_empleado->num_rows > 0) {
                            $empleado = $result_empleado->fetch_assoc();
                            $cargo = $empleado['em_cargo'];

                            echo "<div class='alert alert-success mt-3' role='alert'>Inicio de sesión exitoso como empleado</div>";
                            session_start();
                            $_SESSION['loggedin'] = true;
                            $_SESSION['usuario'] = $correo;

                            if ($cargo == 'gerente') {
                                header("Location: Colaboradores.php?id={$empleado['em_id']}");
                            } else if ($cargo == 'jefe de servicios') {
                                header("Location: jefeservicios.php?id=$empleado[em_id]");
                            } else if ($cargo == 'jefe de venta') {
                                header("Location: jefeventa.php?id=$empleado[em_id]");
                            } else if ($cargo == 'gestora') {
                                header("Location: gestora.php?id=$empleado[em_id]");

                            } else if ($cargo == 'asesor de ventas') {
                                header("Location: asesorVentas.php?id=$empleado[em_id]");
                            }
                            exit;
                        } else {
                            echo "<div class='alert alert-danger mt-3' role='alert'>Correo electrónico o contraseña incorrectos</div>";
                        }
                    }

                    $conn->close();
                }
                ?>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>