<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Verificar si se hizo clic en el botón "Aceptar"
//     if (isset($_POST['aceptar'])) {
//         // Recoger el día seleccionado
//         $diaSeleccionado = $_POST['dias_semana'];
//         $idProf = $_POST['id'];

//         $diaDispoModel->insert(['legajo_prof' => $idProf, 'id_dia' => $diaSeleccionado]);
//         echo "<p>Datos guardados. Repita la selección y cliquee comenzar.</p>";
//         echo '<script>window.location = "#final";</script>';
//     } elseif (isset($_POST['cancelar'])) {
//         echo "<p>Operación cancelada. No se agregaron entradas. Seleccione otros profesores</p>";
//         echo '<script>window.location = "#final";</script>';
//     }
// }


if (isset($_POST['btnConfirmar'])) {

    // Recoger el día seleccionado
    $diaactual = $_POST['viejo'];
    $diaSeleccionado = $_POST['nuevo'];
    $idProf = $_GET['id'];
    echo "<pre> Array VIEJO <br>";
    var_dump($diaactual);
    echo "<pre><hr>";
    echo "<pre> Array NUEVO <br>";
    var_dump($diaSeleccionado);
    echo "<pre>";

    // Busca si se elimino algun dia existente
    foreach ($diaactual as $dato) {
        if (!in_array($dato, $diaSeleccionado)) {
            // Realizar la eliminación en la base de datos
            $diaDispoModel->deleteDia($idProf, $dato);
        }
    }

    // Agrega los dias nuevos
    foreach ($diaSeleccionado as $dato) {
        if (!in_array($dato, $diaactual)) {
            // Realizar la inserción en la base de datos
            $diaDispoModel->insert(['legajo_prof' => $idProf, 'id_dia' => $dato]);
        }
    }

    //  header("location:../Proyecto-Profesores-main/"); //depende el nombre de la carpeta donde estan los archivos
    header("location:../Proyecto-Profesores/home.php");
} else if (isset($_POST['cancelar'])) {
    // header("location:../Proyecto-Profesores-main/"); //lo mismo que el de arriba
    header("location:../Proyecto-Profesores/home.php");
}
?>