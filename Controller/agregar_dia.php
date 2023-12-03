
<?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Verificar si se hizo clic en el botón "Aceptar"
                    if (isset($_POST['aceptar'])) {
                        // Recoger el día seleccionado
                        $diaSeleccionado = $_POST['dias_semana'];
                        $idProf = $_POST['id'];
                        
                        $diaDispoModel->insert(['legajo_prof'=>$idProf,'id_dia'=>$diaSeleccionado]);
                        echo "<p>Datos guardados. Repita la selección y cliquee comenzar.</p>";
                        echo '<script>window.location = "#final";</script>';
                    } 
                    elseif (isset($_POST['cancelar'])) {
                        echo "<p>Operación cancelada. No se agregaron entradas. Seleccione otros profesores</p>";
                        echo '<script>window.location = "#final";</script>';
                    }
                }  
                
?>