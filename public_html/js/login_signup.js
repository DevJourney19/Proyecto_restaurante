const container = document.getElementById("container");
const registerBtn = document.getElementById("btn_registrarse");
const loginBtn = document.getElementById("btn_iniciarSesion");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});
//    let desabilitar = document.getElementById('regresar_a_home');
//    let deshabilitarBotonRegresar = document.querySelector('.login');
//
//    deshabilitarBotonRegresar.onclick = function () {
//        desabilitar.remove();
//    };




//function enter(event) {
//    event.preventDefault();
//    const userValueLogin = document.getElementById("usuario-login");
//    const passwordValueLogin = document.getElementById("password-login");
////    if (isValidUser(userValueLogin.value) && isValidPassword(passwordValueLogin.value)) {
////        alert("Bienvenido a la familia de la Trattoria Secreta");
////        window.location.href = "index.html";
////        return;
////    } else {
////        alert("Credenciales incorrectas, ingresa de nuevo");
////        userValueLogin.value = '';
////        passwordValueLogin.value = '';
////    }
//}

//function isValidUser(user) {
//    if (user === "admin") {
//        return true;
//    }
//}
//
//function isValidPassword(password) {
//    if (password === "123456") {
//        return true;
//    }
//}
