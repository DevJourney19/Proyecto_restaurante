/*Voy a ejecutar el click*/ /*En la función register*/
document.getElementById("btn_registrarse").addEventListener("click", register);
//Cuando se haga clic en el boton iniciarSesion, se cambiara de pantalla
document.getElementById("btn_iniciarSesion").addEventListener("click", iniciarSesion);
window.addEventListener("resize", anchoPagina);
/*Código de Javascript*/
function anchoPagina() {
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        contenedor_login_register.style.left = "10px";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
    }
}

/*Declaración de variables*/
/*Seleccionas esa clase del HTML para poder trabajarlo en Javascript*/
var contenedor_login_register = document.querySelector(
        ".contenedor_login_register"
        );
var formulario_login = document.querySelector(".formulario_login");
var formulario_register = document.querySelector(".formulario_register");

var caja_trasera_login = document.querySelector(".caja_trasera_login");
var caja_trasera_register = document.querySelector(".caja_trasera_register");

/*59:53*/
//anchopagina
/*40:50*/
function register() {
    if (window.innerWidth > 850) {
        /*Cambiamos de none a block*/
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        /*Cambiamos de block a none - para que de esta manera aparezca el register y se oculte el login*/
        formulario_login.style.display = "none";
        /*Ocultamos la caja trasera de register*/
        caja_trasera_register.style.opacity = "0";
        /*Aparecemos la caja trasera de login - para que de esta manera el formulario register esté a la par con el botón trasero de login*/
        caja_trasera_login.style.opacity = "1";
    } else {
        /*Este seria la cosa*/
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        /*Ya no trabajamos con la opacidad, ahora trabajamos con el display*/
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}
/*52:20*/
function iniciarSesion() {
    /*Cambiamos de none a block*/

    if (window.innerWidth > 850) {
        //Cambiamos de none a block
        formulario_register.style.display = "none";

        contenedor_login_register.style.left = "10px";
        /*Cambiamos de none a block - para que de esta manera aparezca el login y se oculte el register*/
        formulario_login.style.display = "block";
        /*Aparecemos la caja trasera de register*/
        caja_trasera_register.style.opacity = "1";
        /*Ocultamos la caja trasera de login - para que de esta manera el formulario register esté a la par con el botón trasero de login*/
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "block";
        /*Ya no trabajamos con la opacidad, ahora trabajamos con el display*/
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

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

anchoPagina();