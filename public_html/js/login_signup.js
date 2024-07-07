const existe_usuario = async () => {
  const usuario_login = document.querySelectorAll(".user_login");
  await fetch("./php/util/verify_session.php")
    .then((response) => response.text())
    //recibe true o false y lo convierte a texto
    .then((data) => {
      //Si la sesion esta activa, el icono es de salida
      if (data.trim() === "1") {
        usuario_login.forEach((user) => {
          user.href = "./php/util/close_session.php";
          user.innerHTML = `
          <i class='bx bx-exit'></i>
          `;
        });
        //Si la sesion no esta activa, el icono es de usuario
      } else {
        usuario_login.forEach((user) => {
          user.href = "./login_signup.php";
          user.innerHTML = `
          <i class='bx bx-user'></i>
          `;
        });
      }
    });
};

const cambiar_pantallas = () => {
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

// const verificar_login = async (event) => {
//   event.preventDefault();
//   const usuario = document.getElementById("usuario-login");
//   const password = document.getElementById("password-login");
//   //Realizar un metodo para enviar datos al user_login.php
//   await fetch("./php/user_login.php", {
//     method: "POST",
//     headers: {
//       //Clave valor
//       "Content-Type": "application/x-www-form-urlencoded",
//     },
//     //Mandamos el valor al user_login.php (que esta arriba)
//     body: `usuario=${usuario.value}&contrasena=${password.value}`,
//   })
//     .then((response) => {
//       return response.text();
//     })
//     .then((data) => {
//       const usuario_existe = data;
//       if (usuario_existe) {
//         console.log("Bienvenido");
//         window.location.href = "bienvenida.php";
//       } else {
//         usuario.value = "";
//         password.value = "";
//       }
//     })
//     .catch((error) => {
//       console.error("Error:", error);
//     });
// };
//Funciona al recargar la pagina
window.addEventListener("load", function () {
  // Obtiene la ruta actual del archivo de la URL
  const currentPath = window.location.pathname; //Trae la url del close_session que es con el parametro agregado ?logout=true
  const urlParams = new URLSearchParams(window.location.search); //Crea un objeto para poder de esta manera obtener el valor de los parametros
  const logout = urlParams.get("logout"); //Obtiene el valor del logout, el cual viene a ser true
  if (currentPath === "/Proyecto_restaurante/public_html/login_signup.php") {
    if (logout) {
      alert("Has cerrado sesión exitosamente.");
    }
    cambiar_pantallas();
  } else {
    existe_usuario();
  }
});
