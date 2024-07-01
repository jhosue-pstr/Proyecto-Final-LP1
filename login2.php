<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login2.css">
</head>

<body>
    <img src="/imagenes/logologin0.jpg" alt="logologin" class="logologin">

    <div class="form-container">
        <h1>Datos del Cliente</h1>
        <form>
            <label for="documento">Documento*</label>
            <input type="text" id="documento" name="documento" placeholder="Ingresa número de DNI" required>

            <label for="nombres">Nombres*</label>
            <input type="text" id="nombres" name="nombres" placeholder="Ingrese sus Nombres" required>

            <label for="apellidos">Apellidos*</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese sus Apellidos" required>

            <label for="email">Email*</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@email.com" required>

            <label for="telefono">Teléfono*</label>
            <input type="tel" id="telefono" name="telefono" placeholder="332332332" required>

            <button type="submit">Enviar</button>
        </form>
    </div>



</body>

</html>