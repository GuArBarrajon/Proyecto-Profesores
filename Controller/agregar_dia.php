
<?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Verificar si se hizo clic en el botón "Aceptar"
                    if (isset($_POST['aceptar'])) {
                        // Recoger el día seleccionado
                        $diaSeleccionado = isset($_POST['dias_semana']);
                        $idProf = $_POST['id'];
                        echo $idProf;
                        echo $diaSeleccionado;
                        $diaDispoModel->insert(['legajo_prof'=>$idProf,'id_dia'=>$diaSeleccionado]);
                    } 
                    elseif (isset($_POST['cancelar'])) {
                        echo "Operación cancelada. No se agregaron entradas.";
                    }
                }  
?>