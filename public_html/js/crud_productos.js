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

window.addEventListener("load", () => {
  cart_products();
});