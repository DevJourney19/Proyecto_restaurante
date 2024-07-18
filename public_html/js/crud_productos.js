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

async function procesarPago() {
  const formulario = document.getElementById("formPago");
  let formData = new FormData(formulario);
  formData.append('total', localStorage.getItem("p_total"));
  formData.append('productos', localStorage.getItem("cart"));
  for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
  }
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
    await procesarPago(); // Llamar a la función
    localStorage.clear();
    window.location.href = "./menu.php";
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
