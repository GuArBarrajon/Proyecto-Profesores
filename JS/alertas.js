function cancelar(){
    location.replace('home.php');
}

function eliminar(){
    let respuesta =confirm("Está seguro de eliminar?");
    return respuesta;
}

function displayMessage2(){
    alert("Error al eliminar docente");
}


function validarCheckbox() {
    // Configura el número máximo de checkboxes permitidos
    var maxCheckboxes = 5;
    
    // Obtiene todos los elementos checkbox
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    // Contador para llevar el control de los checkboxes seleccionados
    var contadorSeleccionados = 0;
    
    // Verifica cuántos checkboxes están seleccionados
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            contadorSeleccionados++;
        }
    });
    
    // Si se excede el número máximo, desmarca el último checkbox seleccionado
    if (contadorSeleccionados > maxCheckboxes) {
        alert("Solo se pueden seleccionar hasta " + maxCheckboxes + " checkboxes. Desmarque las sobrantes, no serán procesadas");
    }
}

//verifica que se hayan seleccionado 5 profesores
function validarProceso() {
    var maxCheckboxes = 5;
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    var contadorSeleccionados = 0;

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            contadorSeleccionados++;
        }
    });
    if (contadorSeleccionados < maxCheckboxes) {
        alert ("Seleccionó menos profesores que la cantidad requerida");
        location.replace('home.php');
    }
}

//verifica que se hayan seleccionado x cantidad de checkbox
function validarCheckbox1($min,$max) {
    console.log("Ingreso al validarCheckBox1");
    // Configura el número máximo de checkboxes permitidos
    var maxCheckboxes = $max;
    var minCheckboxes = $min;
    
    // Obtiene todos los elementos checkbox
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var btnComenzar = document.getElementById('btnConfirmar');
    
    // Contador para llevar el control de los checkboxes seleccionados
    var contadorSeleccionados = 0;
    
    // Verifica cuántos checkboxes están seleccionados
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            contadorSeleccionados++;
        }
    });
    
    // Si se excede el número máximo, desmarca el último checkbox seleccionado
    if ((contadorSeleccionados <= minCheckboxes) || (contadorSeleccionados > maxCheckboxes)) {
        btnComenzar.disabled = true;
        btnComenzar.setAttribute('class', 'btn disabled btn-primary'); 
    if(contadorSeleccionados > maxCheckboxes){        
        alert("Solo se pueden seleccionar hasta " + maxCheckboxes + " checkboxes. Desmarque las sobrantes, no serán procesadas");}
    }else{
        // alert("Selecciono " + maxCheckboxes + " checkboxes. Puede continuar.");
        btnComenzar.disabled = false;   
        btnComenzar.setAttribute('class', 'btn btn-primary');
    }
   
}