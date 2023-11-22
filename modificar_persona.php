<?php
//primero verificamos que el botón se haya presionado
if (!empty($_POST["btnmodificar"])){
    //luego verificamos que todos los campos hayan sido completados
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];

        $profesorModel->updateById($id,[$nombre,$apellido,$telefono,$correo]);
    } 
    else{
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}

?>