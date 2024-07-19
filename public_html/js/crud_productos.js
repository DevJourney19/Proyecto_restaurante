function cart_products() {
  const listContainer = document.querySelector(".container_cart");
  const list = JSON.parse(localStorage.getItem("cart")) || "";
  const precio_total = localStorage.getItem("p_total") || 0;
  let html = "";
  html += `
    <div class="container_cart_content">
        <div class="cart_list">`;
  for (const product of Object.values(list)) {
    const { src, price, title, description, alt, id, amount } = product;
    html += `
        <div class="cart_list_card" id="s">
                <img src="${src}" alt="${alt}">
                <div class="cart_card_info">
                    <div class="cart_card_details">
                        <div class="cart_card_description">
                            <h4>${title}</h4>
                            <p>${description}</p>
                        </div>
                        <span>S/.${price}</span>
                    </div>
                </div>
                <div class="item_quantity">
                    <span><i class='bx bx-shopping-bag'></i></span>
                    <span>${amount}</span>
                </div>
        </div>    
`;
  }
  html += `
  </div>
    <div class="card_total">
            <p>Total</p>
            <span>S/. ${precio_total}</span>
    </div>
    `;
  //Mostraremos la carta en el slide
  listContainer.innerHTML = html;
}

function numeroTarjeta() {
  const inputNumeroTarjeta = document.getElementById("numero-tarjeta");
  let valor = inputNumeroTarjeta.value.replace(/\D/g, ""); // Eliminar caracteres no numéricos primero
  if (valor.length <= 16) {
    const nuevoValor = valor.match(/.{1,4}/g)?.join("-") ?? "";
    inputNumeroTarjeta.value = nuevoValor;
  } else {
    valor = valor.slice(0, 16);
    const nuevoValor = valor.match(/.{1,4}/g)?.join("-");
    inputNumeroTarjeta.value = nuevoValor;
  }
}

function numeroCvv() {
  const inputCvv = document.getElementById("cvv");
  let valor = inputCvv.value.replace(/\D/g, "");
  if (valor.length <= 3) {
    inputCvv.value = valor;
  } else {
    valor = valor.slice(0, 3);
    inputCvv.value = valor;
  }
}

function fechaExp() {
  const inputFechaExp = document.getElementById("fecha");
  let valor = inputFechaExp.value.replace(/\D/g, "");
  if (valor.length > 2) {
    valor = valor.slice(0, 2) + "/" + valor.slice(2, 4);
  }

  inputFechaExp.value = valor; // Actualiza el valor del input con el formato correcto
}

function evaluarTelefono() {
  const inputTelefono = document.getElementById("telefono");
  let valor = inputTelefono.value.replace(/\D/g, "");
  if (valor.length <= 9) {
    inputTelefono.value = valor;
  } else {
    valor = valor.slice(0, 9);
    inputTelefono.value = valor;
  }
}

function evaluarMontoPagar() {
  const inputMontoPagar = document.getElementById("monto-pagar");
  let valor = inputMontoPagar.value.replace(/[^\d.,]/g, "");
  valor = valor.replace(",", ".");
  if (!isNaN(valor) && valor.split(".").length <= 2) {
    inputMontoPagar.value = valor;
  }
}

function validarFormulario() {
  const error = document.getElementById("error");
  error.innerHTML = "";
  const location = document.getElementById("location");
  const direccion = document.getElementById("direccion");
  const telefono = document.getElementById("telefono");
  const pago_online = document.getElementById("pago-completo");
  const pago_contraentrega = document.getElementById("pago-contraentrega");
  const monto_pagar = document.getElementById("monto-pagar");
  if (location.value === "") {
    error.innerHTML = "Por favor, ingrese una dirección de entrega";
    return false;
  }
  if (direccion.value === "") {
    error.innerHTML = "Por favor, ingrese una dirección de entrega";
    return false;
  }
  if (telefono.value === "") {
    error.innerHTML = "Por favor, ingrese un número de teléfono valido ";
    return false;
  }

  if (telefono.value.length < 9) {
    error.innerHTML = "Por favor, ingrese un número de teléfono valido ";
    return false;
  }

  const total_compra = Number(localStorage.getItem("p_total"));
  if (pago_contraentrega.checked && monto_pagar.value === "") {
    error.innerHTML = "Por favor, ingrese el monto a pagar";
    return false;
    if (monto_pagar.value <= 0) {
      error.innerHTML = "Por favor, ingrese un monto mayor a 0";
      return false;
    } else if (Number(monto_pagar.value) < total_compra) {
      error.innerHTML =
        "Por favor, ingrese un monto mayor al total de la compra";
      return false;
    }
  }

  if (pago_online.checked) {
    const nombreTitular = document.getElementById("nombre-titular");
    const numeroTarjeta = document.getElementById("numero-tarjeta");
    const fecha = document.getElementById("fecha");
    const cvv = document.getElementById("cvv");
    if (
      nombreTitular.value === "" ||
      numeroTarjeta.value === "" ||
      fecha.value === "" ||
      cvv.value === ""
    ) {
      error.innerHTML = "Por favor, complete todos los campos del formulario";
      return false;
    }
  }

  return true;
}

async function procesarPago() {
  const formulario = document.getElementById("formPago");
  let formData = new FormData(formulario);
  formData.append("total", localStorage.getItem("p_total"));
  formData.append("productos", localStorage.getItem("cart"));
  await fetch("./php/datos_carrito.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => console.log(data))
    .catch((error) => console.error("Error:", error));
}

document
  .getElementById("botonPagar")
  .addEventListener("click", async function (event) {
    event.preventDefault();
    //validar todos los campos del formulario
    if (validarFormulario()) {
      await procesarPago(); // Llamar a la función
      localStorage.clear();

      let resultado = confirm("¿Deseas generar un pdf de la compra realizada?");
      if (resultado) {
        window.location.href = "./php/util/pdf.php";
        setTimeout(function () {
          window.location.href = "./menu.php"; // Redirige a menu.php después de 4 segundos
        }, 4000);
      } else {
        window.location.href = "./menu.php";
      }
    }
  });

document
  .getElementById("regresarButton")
  .addEventListener("click", async function (event) {
    event.preventDefault();
    window.location.href = "./menu.php";
  });

window.addEventListener("load", () => {
  cart_products();
});
