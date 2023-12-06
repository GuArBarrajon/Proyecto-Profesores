<?php
$bandera = 1;
//primero verificamos que el botón se haya presionado
if (!empty($_POST["btnregistrarAdm"])){
    //luego verificamos que todos los campos hayan sido completados correctamente
    if(!empty($_POST["usuario"]) and !empty($_POST["contrasenia"])){
        if(strlen($_POST["usuario"]) > 50){
            echo '<div class="alert alert-warning">El usuario es demasiado largo</div>';
            $bandera=0;
        }else{
            $usuario=$_POST["usuario"];
        }
        if(strlen($_POST["contrasenia"]) > 50){
            echo '<div class="alert alert-warning">La contraseña es demasiado larga</div>';
            $bandera=0;
        }else{
            $contraseña=$_POST["contrasenia"];
        }

        if($bandera!= 0){
            $administradorModel->insert(['usuario'=>$usuario, 'contrasenia'=>$contraseña]);
        }
    } 
    else{
        echo '<div class="alert alert-warning">Complete todos los campos</div>';
        $bandera=0;
    }
    if($bandera== 1){
        header("location:administradores.php");
    }
}
?>