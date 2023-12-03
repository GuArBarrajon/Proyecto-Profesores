<?php
require_once(__DIR__."/Model/Database.php");
require_once(__DIR__."/Model/Orm.php");
require_once(__DIR__."/Model/profesor.php");

$database = new Database();
$coneccion = $database->getConnection();

$id = $_GET['id'];
$profesorModel = new Profesor($coneccion);
$profe = $profesorModel->getById($id);

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
    <title>Modificar Profesor</title>
</head>

<body>
    <form class="col-4 p-4 m-auto" method="post">
        <h3 class="text-center bg-light bg-gradient text-secondary">Modificar Docente</h3>
        <input type="hidden" name="id" value="<?= $_GET['id']?>">
        <?php include "Controller/modificar_profesor.php";?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $profe['nombres'] ?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $profe['apellido'] ?>">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $profe['telefono'] ?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Email</label>
                <input type="text" class="form-control" name="correo" value="<?= $profe['email'] ?>">
            </div>

        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
    </form>
    <?php
        $database->closeConnection();
    ?>
</body>

</html>