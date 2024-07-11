function cart_products() {
  const listContainer = document.querySelector(".container_cart");
  const list = JSON.parse(localStorage.getItem("cart")) || "";
  const precio_total = localStorage.getItem("p_total") || 0;
  console.log(list);
  let html = "";
  html += `
    <div class="container_cart_content">
        <div class="cart_list">`;
  for (const product of Object.values(list)) {
    console.log(product);
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
                    <button>
                        <i class='bx bx-plus' id="${id}"></i>
                    </button>
                    <span>${amount}</span>
                    <button>
                        <i class='bx bx-minus' id="${id}"></i>
                    </button>
                </div>
                <button class="item_remove">
                    <i class='bx bx-x' id="${id}"></i>
                </button>
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

window.addEventListener("load", () => {
  cart_products();
});