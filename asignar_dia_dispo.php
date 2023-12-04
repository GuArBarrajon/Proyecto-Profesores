<?php
require_once(__DIR__ . "/Model/Database.php");
require_once(__DIR__ . "/Model/Orm.php");
require_once(__DIR__ . "/Model/profesor.php");
require_once(__DIR__ . "/Model/dia_disponible.php");
require_once(__DIR__ . "/Model/dia.php");

$database = new Database();
$coneccion = $database->getConnection();

$profesorModel = new Profesor($coneccion);
$docente = $profesorModel->getById($_GET['id']);

$diaModel = new Dia($coneccion);
$dias = $diaModel->getAll();

$diaDispoModel = new DiaDisponible($coneccion);
$carga_dia = $diaDispoModel->getByProfe($_GET['id']);

// VERIFICAR DATOS ----- BORRAR
// echo "<pre> Carga Dias Asignados";
// var_dump($carga_dia);
// echo "</pre>";

// echo "<pre> Dias Semana";
// var_dump($dias);
// echo "</pre>";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6b89d61c4.js" crossorigin="anonymous"></script>
    <title>Agregar Docente</title>
</head>

<body>
    <form class="col-md-4 col-sm-8 p-4 m-auto" method="post">
        <h3 class="text-center bg-light bg-gradient text-secondary">Docente</h3>
        <?php include "Controller/modificar_dia.php"; ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="<?php echo $docente['nombres'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="<?php echo $docente['apellido'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="<?php echo $docente['telefono'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Email</label>
            <input type="text" class="form-control" name="correo" id="correo" placeholder="<?php echo $docente['email'] ?>" disabled>
        </div>

        <div class="table-responsive-xl">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" colspan="6"> Dias disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                        <td>#</td>
                        <td>Lunes</td>
                        <td>Martes</td>
                        <td>Miercoles</td>
                        <td>Jueves</td>
                        <td>Viernes</td>
                    </tr>
                    <tr>
                        <td>Actual</td>
                        <?php
                        foreach ($dias as $semana) {
                            $recorrido = 0;

                            foreach ($carga_dia as $val_dia) {
                                if ($semana['id'] == $val_dia['id_dia']) {
                                    echo "<td><input type='text' value={$semana['id']} name='viejo[]' class='giru' hidden>  <i class='fa-solid fa-square-check'></i>   </td>";
                                    break;
                                } else {
                                    $recorrido++;
                                }
                            }
                            if ($recorrido == count($carga_dia)) {
                                echo "<td><input type='radio' class='giru' hidden disabled> <i class='fa-solid fa-square-xmark'></i></td>";
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Nuevo</td>
                        <?php
                        $cant=0;

                        foreach ($dias as $semana) {
                            echo "<td><input type='checkbox' value={$semana['id']} name='nuevo[]' class='giru' onclick='validarCheckbox1($cant)'></td>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary disabled" name="btnConfirmar" value="aceptar" id="btnConfirmar">Registrar</button>
        <button type="submit" class="btn btn-danger" name="cancelar" value="cancelar" onclick='cancelar()'>Cancelar</button>
    </form>

    <script src="JS/alertas.js"></script>

</body>

</html>