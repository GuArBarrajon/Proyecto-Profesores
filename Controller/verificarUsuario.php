<?php
    $administradores = $administradorModel->getAll();
    $bandera = 0;
    session_start();
    //primero verificamos que el botón se haya presionado
    if (!empty($_POST["btnIngresar"]))
    {
        //luego verificamos que todos los campos hayan sido completados correctamente
        if(!empty($_POST["usuario"]) and !empty($_POST["contraseña"]))
        {
            foreach ($administradores as $adm) 
            {
                if ($adm['usuario'] == $_POST['usuario'] and $adm['contrasenia'] == $_POST['contraseña']) 
                {
                    $x=$_POST['usuario'];
                    $_SESSION['usuario'] = $x;
                    header("location:home.php");
                    $bandera = 1;
                }
            }
            if ($bandera != 1){
                echo '<div class="alert alert-warning">Usuario o contraseña incorrectos</div>';
            }
            //exit();
        }else {  
            echo '<div class="alert alert-warning">Complete todos los campos</div>';
        }
    }
?>