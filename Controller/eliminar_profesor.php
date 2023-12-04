<?php
$bandera = 0;
//primero verificamos que se haya mandado el id
if (!empty($_GET["id"])){
    $id=$_GET["id"];
    $diaDispoModel->deleteXProfe($id);
    $profesorModel->deleteById($id);
    $bandera = 1;
    if($bandera==1){
        header("location:home.php");
    }
    else
    {
        echo '<script> displayMessage2() </script>';
    }
}
?>