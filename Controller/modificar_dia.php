<?php
if (isset($_POST['btnConfirmar']) && (isset($_POST['viejo']))) {

    // Recoger el día seleccionado
    $diaActual = $_POST['viejo'];
    $diaNuevo = $_POST['nuevo'];
    $idProf = $_GET['id'];

    // Busca si se elimino algun dia existente
    foreach ($diaActual as $dato) {
        if (!in_array($dato, $diaNuevo)) {
            // Realizar la eliminación en la base de datos
            $diaDispoModel->deleteDia($idProf, $dato);
        }
    }
    // Agrega los dias nuevos
    foreach ($diaNuevo as $dato) {
        if (!in_array($dato, $diaActual)) {
            // Realizar la inserción en la base de datos
            $diaDispoModel->insert(['legajo_prof' => $idProf, 'id_dia' => $dato]);
        }
    }
    header("location:home.php");
} else if((isset($_POST['btnConfirmar']) && (!isset($_POST['viejo'])))){
    $diaNuevo = $_POST['nuevo'];
    $idProf = $_GET['id'];

    foreach ($diaNuevo as $dato) {
            // Realizar la inserción en la base de datos
            $diaDispoModel->insert(['legajo_prof' => $idProf, 'id_dia' => $dato]);
    }
    header("location:home.php");
}
if (isset($_POST['cancelar'])) {
    header("location:home.php");
}
?>
