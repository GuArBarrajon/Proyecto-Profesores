<?php
$bandera = 1;
//primero verificamos que el botón se haya presionado
if (!empty($_POST["btnregistrar"])){
    //luego verificamos que todos los campos hayan sido completados correctamente
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"])){
        if(strlen($_POST["nombre"]) > 25){
            echo '<div class="alert alert-warning">El nombre es demasiado largo</div>';
            $bandera=0;
        }else{
            $nombre=$_POST["nombre"];
        }
        if(strlen($_POST["apellido"]) > 25){
            echo '<div class="alert alert-warning">El apellido es demasiado largo</div>';
            $bandera=0;
        }else{
            $apellido=$_POST["apellido"];
        }
        if(is_numeric($_POST["telefono"]) and strlen($_POST["telefono"])==10){
            $telefono=$_POST["telefono"];           
        }else{   
            echo '<div class="alert alert-warning">El teléfono debe ser un número de 10 dígitos</div>';
            $bandera=0;     
        }
        if(!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
            echo '<div class="alert alert-warning">Ingrese un correo válido</div>';
            $bandera=0;     
        }
        else{
            $correo=$_POST["correo"];            
        }

        if($bandera!= 0){
            $profesorModel->insert(['nombres'=>$nombre, 'apellido'=>$apellido, 'telefono'=>$telefono,'email'=>$correo]);
        }
    } 
    else{
        echo '<div class="alert alert-warning">Complete todos los campos</div>';
        $bandera=0;

    }
    if($bandera== 1){
        header("location:../home.php#final");
    }
}
?>