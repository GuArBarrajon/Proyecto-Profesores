<?php
$bandera = 0;
//primero verificamos que se haya mandado el id
if (!empty($_GET["id"])){
    $id=$_GET["id"];
    $diaDispoModel->deleteXProfe($id);
    $profesorModel->deleteById($id);
    $bandera = 1;
    if($bandera==1){
        echo '<script> displayMessage1() </script>';
        header("location:../index.php");
    }
    else
    {
        echo '<script> displayMessage2() </script>';
    }
}
?>