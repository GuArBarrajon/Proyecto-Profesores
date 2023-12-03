<?php
$resultados = array();

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Define el número máximo de checkboxes permitidos
    $maxCheckboxes = 5;

    // Recoge los valores de los checkboxes
    $checkboxValues = isset($_POST['opciones']) ? $_POST['opciones'] : array();

    // Verifica si se excede el número máximo permitido
    if (count($checkboxValues) > $maxCheckboxes) {
        echo "Error: Seleccionaste más checkboxes de los permitidos.";
    }
    elseif (count($checkboxValues) < $maxCheckboxes) {
        echo "";
    } 
    else {
        $diasAsignables = [1, 2, 3, 4, 5];
        
        //recupera cada uno de los profesores seleccionados
        foreach ($checkboxValues as $key => $value) {
            $profesor = $profesorModel->getById($value);
            
            $Id_prof = $profesor["id"];
            //recupera todos los días disponibles del profesor
            $diasDisposProf = $diaDispoModel->getByProfe($Id_prof);
            $bandera = 0;
            
            //dentro del array de días disponibles busca en cada día
            foreach ($diasDisposProf as $dDProf) {
                if ($bandera == 0) {
                    $i=0;
                    while($i <5){
                        if ($dDProf["id_dia"] == $diasAsignables[$i]) {
                            
                            $resultados[$i] = $dDProf["id"];
                            
                            $diasAsignables[$i] = 0;
                            $bandera = 1;
                        }
                        $i++;
                    }
                } 
            }
            if ($bandera == 0) {
                echo "A {$profesor['nombres']} {$profesor['apellido']} no se le pudo asignar día <br>";
                echo "Quedan disponibles: <br>";?>
                    <form  action = "" method="post">
                    <input type="hidden" name="id" value="<?= $Id_prof?>">
                    <?php
                    include "Controller/agregar_dia.php";
                    for ($i = 0; $i < 5; $i++) {
                        if($diasAsignables[$i] != 0) {
                            $x = $i + 1;
                            $dia = $diaModel->getById($x);
                            
                            echo '<label><input type="radio" name="dias_semana" value="' . $dia['id'] . '">' . $dia['nombre'] . '</label><br>';
                        }
                    }
                    

                echo "Consulte con el docente si puede, seleccione y acepte. O cancele y elija otro profesor. <br>";
                echo '<script>window.location = "#final";</script>';
                ?>
                <!-- Botones de Aceptar y Cancelar -->
                <input type="submit" name="aceptar" value="Aceptar">
                <input type="submit" name="cancelar" value="Cancelar" onclick="cancelar()">
                </form>
                <?php 
            }
        }
        
    }

    
    //Impresión de la tabla resultado
    if (count($resultados) == 5){
        echo "<h1>Resultado</h1>";
        echo "<table class = 'flex text-center'>";
        echo "<thead>";
        echo "<tr>";
        for( $i = 0; $i < 5; $i++) {
            $diaSeleccionado = $diaDispoModel->getById($resultados[$i]);
            $dia= $diaModel->getById($diaSeleccionado['id_dia']);
            
            echo "<th>{$dia['nombre']}</th>";
        }
        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        for( $i = 0; $i < 5; $i++) {
            $diaSeleccionado = $diaDispoModel->getById($resultados[$i]);
            $prof = $profesorModel->getById($diaSeleccionado['legajo_prof']);
            
            echo "<td>{$prof['nombres']}</td>";
        }
        echo "<tr>";
        echo "</tr>";
        for( $i = 0; $i < 5; $i++) {
            $diaSeleccionado = $diaDispoModel->getById($resultados[$i]);
            $prof = $profesorModel->getById($diaSeleccionado['legajo_prof']);
            
            echo "<td>{$prof['apellido']}</td>";
        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table><br>";
        echo "<a class='btn btn-secondary' href='home.php'>Finalizar</a>";
        echo '<script>window.location = "#final";</script>';
    }
}
?>