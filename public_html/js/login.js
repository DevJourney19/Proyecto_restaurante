/*Voy a ejecutar el click*/ /*En la función register*/
//document.getElementById("btn_registrarse").addEventListener("click", register);
////Cuando se haga clic en el boton iniciarSesion, se cambiara de pantalla
//document.getElementById("btn_iniciarSesion").addEventListener("click", iniciarSesion);

/*Metodo para cambiar se clase*/


function cambio_a_register () {
    window.location.href = "register.html";
};


/*Declaración de variables*/
/*Seleccionas esa clase del HTML para poder trabajarlo en Javascript*/
var contenedor_login_register = document.querySelector(
        ".contenedor_login_register"
        );
var formulario_login = document.querySelector(".formulario_login");
var formulario_register = document.querySelector(".formulario_register");

var caja_trasera_login = document.querySelector(".caja_trasera_login");
var caja_trasera_register = document.querySelector(".caja_trasera_register");

function enter(event) {
    event.preventDefault();
    const userValueLogin = document.getElementById("usuario-login");
    const passwordValueLogin = document.getElementById("password-login");
    if (isValidUser(userValueLogin.value) && isValidPassword(passwordValueLogin.value)) {
        alert("Bienvenido a la familia de la Trattoria Secreta");
        window.location.href = "index.html";
        return;
    } else {
        alert("Credenciales incorrectas, ingresa de nuevo");
        userValueLogin.value = "";
        passwordValueLogin.value = "";
    }
}

function isValidUser(user) {
    if (user === "admin") {
        return true;
    }
}

function isValidPassword(password) {
    if (password === "123456") {
        return true;
    }
}

//anchoPagina();