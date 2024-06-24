const messageDiv = document.getElementById('usuario_registrado');
document.getElementById('reg_registrar').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma tradicional

    const formData = new FormData(this);

    fetch('./php/user_register.php', {
        method: 'POST',
        body: formData
    })
            .then(response => response.json())
            .then(data => {

                switch (data.success) {
                    case "correo_ya_existe":
                        rem_reg_exitoso();
                        messageDiv.textContent = 'Error: Ese correo ya está en uso';
                        break;
                    case "usuario_ya_existe":
                        rem_reg_exitoso()
                        messageDiv.textContent = 'Error: Ese usuario ya está en uso';
                        break;
                    case "registrado":
                        messageDiv.classList.remove("mensaje_reg_fallido");
                        messageDiv.classList.add("mensaje_reg_exitoso");
                        messageDiv.textContent = 'Usuario registrado exitosamente';
                        document.getElementById("r_fname").value = "";
                        document.getElementById("r_email").value = "";
                        document.getElementById("r_user").value = "";
                        document.getElementById("r_pass").value = "";
                        setTimeout(function () {
                            messageDiv.textContent = '';
                            messageDiv.classList.remove("mensaje_reg_exitoso");
                        }, 5000);
                        break;
                    case "no_registrado":
                        rem_reg_exitoso();
                        messageDiv.textContent = 'Intente nuevamente, usuario no almacenado';
                        break;
                }
            })
            .catch(error => {
                console.log(error);
            });
});
function rem_reg_exitoso() {
    messageDiv.classList.remove("mensaje_reg_exitoso");
    messageDiv.classList.add("mensaje_reg_fallido");
}

