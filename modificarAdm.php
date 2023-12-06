<?php
require_once(__DIR__."/Model/Database.php");
require_once(__DIR__."/Model/Orm.php");
require_once(__DIR__."/Model/administrador.php");

$database = new Database();
$coneccion = $database->getConnection();

$id = $_GET['id'];
$administradorModel = new Administrador($coneccion);
$adm = $administradorModel->getById($id);

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
    <title>Modificar Administrador</title>
</head>

<body>
    <div class="formulario">
        <form class="col-md-4 col-sm-8 p-4 m-auto" method="post">
            <h3 class="text-center bg-light bg-gradient text-secondary">Modificar Administrador</h3>
            <input type="hidden" name="id" value="<?= $_GET['id']?>">
            <?php include "Controller/modificar_administrador.php";?>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?= $adm['usuario'] ?>">
                </div>
                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenia" value="<?= $adm['contrasenia'] ?>">
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="btnmodificarAdm" value="ok">Modificar</button>
                </div>
        </form>
    </div>
    <?php
        $database->closeConnection();
    ?>
</body>

</html>