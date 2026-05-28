document.getElementById('miFormulario').addEventListener('submit', function(event) {
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;

    if (nombre.trim() === "" || email.trim() === "") {
        alert("Por favor, rellena todos los campos.");
        event.preventDefault(); // Cancela el envío del formulario si hay campos vacíos
    } else {
        // Muestra el bloque de alerta verde de éxito antes de que procese PHP
        document.getElementById('mensajeExito').style.display = 'block';
    }
});
