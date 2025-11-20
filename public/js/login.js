function validarLogin() {
    var loginInput = document.getElementById('login');

    if (!loginInput || !loginInput.value.trim()) {
        alert('Por favor, escribe tu usuario (login)');
        return false; // cancela el envío del formulario
    }

    // Si pasa la validación, se envía el formulario
    return true;
}
