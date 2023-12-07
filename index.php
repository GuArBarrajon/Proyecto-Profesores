<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ya ha iniciado sesión, si es así, redirige a la página de inicio
if (isset($_SESSION['usuario'])) {
    header("Location:home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">

    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
    <link rel="manifest" href="image/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6b89d61c4.js" crossorigin="anonymous"></script>
    <title>Asignación de Días a Profesores</title>
</head>
<body>
<header class='container'>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid" id="header">
                    <h1 class="text-light" id="instituto">Instituto Educativo</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" id="toggle"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <a href="login.php" id="botonIniciar">Iniciar Sesión</a>
                    </div>
                </div>
            </nav>
    </header>

        <h1>Bienvenido a Nuestra Institución Educativa</h1>

    <section>
        <h2>¡Gracias por utilizar nuestra aplicación!</h2>
        <p>Aquí podrá generar horarios de los cursos, gestionar los datos de los docentes y sus días disponibles. Además podrá gestionar quiénes tienen acceso a esta aplicación.</p>
        <p>Siempre comprometidos con la calidad educativa.</p>
    </section>

    <footer >
        &copy; 2023 Nuestra Institución Educativa. Todos los derechos reservados.
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    
    <script src="../JS/alertas.js"></script>
</body>
</html>