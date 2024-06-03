document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar todos los formularios en el documento
    var forms = document.querySelectorAll('form');
    
    // Añadir un evento 'submit' a cada formulario
    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            // Seleccionar todos los botones de envío en el formulario actual
            var submitButtons = form.querySelectorAll('button[type="submit"]');
            
            // Deshabilitar cada botón de envío
            submitButtons.forEach(function (button) {
                button.disabled = true;
            });
        });
    });
});