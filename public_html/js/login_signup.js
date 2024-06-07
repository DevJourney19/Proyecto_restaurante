const existeUsuario = async () => {
  const userLogin = document.querySelectorAll(".user_login");
  await fetch("./php/verify_session.php")
    .then((response) => response.text())
    .then((data) => {
      if (data.trim() === "1") {
        userLogin.forEach((user) => {
          user.href = "./php/close_session.php";
          user.innerHTML = `
          <i class='bx bx-exit'></i>
          `;
          console.log(userLogin);
        });
      } else {
        userLogin.forEach((user) => {
          user.href = "index.php";
          user.innerHTML = `
          <i class='bx bx-user'></i>
          `;
          console.log(userLogin);
        });
      }
    });
};

const cambiarPantallas = () => {
  const registerBtn = document.getElementById("btn_registrarse");
  const loginBtn = document.getElementById("btn_iniciarSesion");

  registerBtn.addEventListener("click", (event) => {
    event.preventDefault();
    container.classList.add("active");
  });

  loginBtn.addEventListener("click", (event) => {
    event.preventDefault();
    container.classList.remove("active");
  });
};

const verificarLogin = async (event) => {
  event.preventDefault();
  const usuario = document.getElementById("usuario-login");
  const password = document.getElementById("password-login");
  await fetch("./php/user_login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `usuario=${usuario.value}&contrasena=${password.value}`,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      const usuarioExiste = data;
      if (usuarioExiste) {
        console.log("Bienvenido");
        alert("Bienvenido");
        window.location.href = "home.php";
      } else {
        alert("Usuario o contraseña incorrectos");
        usuario.value = "";
        password.value = "";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};

window.onload = function () {
  const currentPath = window.location.pathname;
  const urlParams = new URLSearchParams(window.location.search);
  const logout = urlParams.get("logout");
  if (currentPath === "/Proyecto_restaurante/public_html/index.php") {
    cambiarPantallas();
  } else {
    existeUsuario();
  }
  if (logout) {
    alert("Has cerrado sesión exitosamente.");
  }
};
