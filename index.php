<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
    <link rel="manifest" href="image/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6b89d61c4.js" crossorigin="anonymous"></script>
    <title>Asignación de Días a Profesores</title>
</head>
<body class='container'>
    <script>
        function eliminar(){
            let respuesta =confirm("Está seguro de eliminar?");
            return respuesta;
        }
        function displayMessage1(){
            alert("Docente eliminado correctamente");
            location.replace('index.php'); //para que se recargue la página
        }
        function displayMessage2(){
            alert("Error al eliminar docente");
            location.href ='index.php';
        }
    </script>
    <?php
        require_once(__DIR__."/Database.php");
        require_once(__DIR__."/Orm.php");
        require_once(__DIR__."/profesor.php");
        require_once(__DIR__."/dia_disponible.php");
        require_once(__DIR__."/dia.php");
    
        $database = new Database();
        $coneccion = $database->getConnection();
    
        $profesorModel = new Profesor($coneccion);
        $profesores = $profesorModel->getAll();

        $diaModel = new Dia($coneccion);
        $dias = $diaModel->getAll();
        $diaDispoModel = new DiaDisponible($coneccion);
        $diasDispos = $diaDispoModel->getAll();
        
        include "eliminar_profesor.php";
    ?>
    <h1>Cuerpo docente de la institución</h1>
    <p>Seleccione 5 docentes para comenzar.</p>
    <form action="procesar_asignacion.php" method="post">
    
        <table class = 'flex'>
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
                                <a class="btn btn-small btn-warning" href="modificar.php?id=<?= $profesor['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $profesor['id'] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    <?php                     
                    echo "<td><input type='checkbox' value={$profesor['id']} id={$profesor['id']} class='giru'></td";
                    echo "</tr>";
                }
                ?>
            </select>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Comenzar</button>
    </form>
    <br>
    <a class="btn btn-secondary" href="agregar.php">Agregar Docente</a>

    <!-- Tabla de resultados -->
    <table id="tabla-resultados">
        <!-- Aquí se mostrará la tabla de resultados -->
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
