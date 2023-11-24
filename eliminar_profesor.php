<?php
require_once(__DIR__."/Database.php");
require_once(__DIR__."/Orm.php");
require_once(__DIR__."/profesor.php");
require_once(__DIR__."/dia_disponible.php");

$database = new Database();
$coneccion = $database->getConnection();

$profesorModel = new Profesor($coneccion);
$diaDispoModel = new DiaDisponible($coneccion);

$bandera = 0;
//primero verificamos que se haya mandado el id
if (!empty($_GET["id"])){
    $id=$_GET["id"];
    $diaDispoModel->deleteXProfe($id);
    $profesorModel->deleteById($id);
    $bandera = 1;
    if($bandera==1){
        echo '<script> displayMessage1() </script>';
    }
    else
    {
        echo '<script> displayMessage2() </script>';
    }
}
?>