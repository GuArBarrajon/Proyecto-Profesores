<?php
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

    header("location:home.php");
} else if (isset($_POST['cancelar'])) {

    header("location:home.php");
}
?>