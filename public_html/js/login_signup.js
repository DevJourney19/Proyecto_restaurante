const container = document.getElementById("container");
const registerBtn = document.getElementById("btn_registrarse");
const loginBtn = document.getElementById("btn_iniciarSesion");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});

