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
                                <a class="nav-link" href="Administradores.php">Administradores</a>
                            </li>
                        </ul>
                        <a href="/login.php" id="boton">Cerrar Sesión</a>
                    </div>
                </div>
            </nav>
        </header>

    <?php
        require_once(__DIR__."/Model/Database.php");
        require_once(__DIR__."/Model/Orm.php");
        require_once(__DIR__."/Model/profesor.php");
        require_once(__DIR__."/Model/dia_disponible.php");
        require_once(__DIR__."/Model/dia.php");
    
        $database = new Database();
        $coneccion = $database->getConnection();
    
        $profesorModel = new Profesor($coneccion);
        $profesores = $profesorModel->getAll();

        $diaModel = new Dia($coneccion);
        $dias = $diaModel->getAll();
        $diaDispoModel = new DiaDisponible($coneccion);
        $diasDispos = $diaDispoModel->getAll();
        
        include "Controller/eliminar_profesor.php";
    ?>
    <h1>Cuerpo docente de la Institución</h1>
    
    <form action="" method="post">
    <h5>Seleccione 5 docentes para comenzar.</h5>
        <table class = 'tablaDocentes'>
            <thead>
                <tr>
                    <th>Legajo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefóno</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($profesores as $profesor) {
                    echo "<tr>";
                    echo "<td>{$profesor['id']}</td>";
                    echo "<td>{$profesor['nombres']}</td>";
                    echo "<td>{$profesor['apellido']}</td>";
                    echo "<td>{$profesor['telefono']}</td>";
                    echo "<td>{$profesor['email']}</td>";?>
                    <td>
                                <a class="btn btn-small btn-warning" href="modificar.php?id=<?= $profesor['id'] ?>" title="Modificar Docente"><i class="fa-solid fa-pen-to-square" ></i></a>
                                <a onclick="return eliminar()" href="home.php?id=<?= $profesor['id'] ?>" class="btn btn-small btn-danger" title="Eliminar Docente"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    <?php                     
                    echo "<td><input type='checkbox' value={$profesor['id']} name='opciones[]' class='giru' onclick='validarCheckbox()'></td";
                    echo "</tr>";
                }
                ?>
            </select>
            </tbody>
        </table>
        <div class="botones">
            <button type="submit" class="btn btn-primary" onclick='validarProceso()' title="Generar Horario" id="comenzar">Comenzar</button>
        </div>
    </form>
    <div class="botones"><a class="btn btn-secondary" href="agregar.php">Agregar Docente</a></div>
    

    <!-- Tabla de resultados -->
    <div id="tabla-resultados">
        <!-- Aquí se mostrará la tabla de resultados -->
        <?php 
            include "Controller/procesar_asignacion.php"; 
            include "Controller/agregar_dia.php";
        ?>
    </div>
    <?php
        $database->closeConnection();
    ?>
    <a  id="final"></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    
    <script src="JS/alertas.js"></script>
</body>
</html>