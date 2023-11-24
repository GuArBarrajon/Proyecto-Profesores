<?php
$bandera;
//primero verificamos que el botón se haya presionado
if (!empty($_POST["btnregistrar"])){
    //luego verificamos que todos los campos hayan sido completados
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"])){
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];

        $profesorModel->insert(['nombres'=>$nombre, 'apellido'=>$apellido, 'telefono'=>$telefono,'email'=>$correo]);
        echo '<div class="alert alert-warning">Agregado correctamente</div>';
        $bandera=1;
    } 
    else{
        echo '<div class="alert alert-warning">Complete todos los campos</div>';
        $bandera=0;

    }
    if($bandera== 1){
        header("location:index.php");
    }
}
?>