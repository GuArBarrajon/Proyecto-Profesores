<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión, si no es así, redirige a la página de inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
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
    <title>Administradores de la aplicación</title>
</head>
<body class='container'>
    <header class='col-12' >
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid" id="header">
                    <h1 class="text-light" id="instituto">Instituto Educativo</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" id="toggle"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link nav-menu-link-active" aria-current="page" href="home.php">Docentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="administradores.php">Administradores</a>
                            </li>
                        </ul>
                        <a href="Controller/cerrar_sesion.php" id="boton">Cerrar Sesión</a>
                    </div>
                </div>
            </nav>
        </header>

    <?php
        require_once(__DIR__."/Model/Database.php");
        require_once(__DIR__."/Model/Orm.php");
        require_once(__DIR__."/Model/administrador.php");
    
        $database = new Database();
        $coneccion = $database->getConnection();
    
        $administradorModel = new Administrador($coneccion);
        $administradores = $administradorModel->getAll();


        
        include "Controller/eliminar_administrador.php";
    ?>
    <h1>Administradores de la aplicación</h1>
    
    <form action="" method="post">
    <h5>Listado de usuarios con acceso a la aplicación.</h5>
        <table class = 'tablaAdministradores'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($administradores as $adm) {
                    echo "<tr>";
                    echo "<td>{$adm['id']}</td>";
                    echo "<td>{$adm['usuario']}</td>";
                    echo "<td><input type='password' value='<?= {$adm["contrasenia"]} ?>' readonly></td>";?>
                    <td>
                                <a class="btn btn-small btn-warning" href="modificarAdm.php?id=<?= $adm['id'] ?>" title="Modificar Datos Administrador"><i class="fa-solid fa-pen-to-square" ></i></a>
                                <a onclick="return eliminar()" href="administradores.php?id=<?= $adm['id'] ?>" class="btn btn-small btn-danger" title="Eliminar Administrador"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    <?php   
                }
                ?>
            </tbody>
        </table>
    </form>
    <div class="botones"><a class="btn btn-secondary" href="agregarAdm.php">Agregar Administrador</a></div>
    
    <?php
        $database->closeConnection();
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    
    <script src="JS/alertas.js"></script>
</body>
</html>