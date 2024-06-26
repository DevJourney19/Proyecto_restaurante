let slide = document.querySelector(".container_cart");
let notificar = document.querySelectorAll(".notification");
let notification_nav = 0;
let precio_total = 0;
let cart = {};
let count = 0;
let total = 0;

function add_product() {
  //Se selecciona el campo de los platillos para poder llamarlos [menu]
  const productos_html = document.querySelector(".menu");
  //Obtenemos la informacion que se almacenó en el navegador. Si es la primera vez, se validará con el valor 0
  cart = JSON.parse(window.localStorage.getItem("cart")) || {};
  count = parseInt(window.localStorage.getItem("contador")) || 0; // Obtener contador desde localStorage
  notification_nav = parseInt(window.localStorage.getItem("notificacion")) || 0;
  precio_total = parseInt(window.localStorage.getItem("p_total")) || 0;
  //  (Esto es solo para una clase): notificar.innerHTML = notification_nav;
  notificar.forEach((el) => (el.innerHTML = notification_nav));

  //Se hace un if para comprobar si estamos en el archivo menu.php
  if (productos_html) {
    //Añadimos eventos a los botones de los productos que se encuentran en menu.php, para detectar el producto y "llevarlo" al slide.
    productos_html.addEventListener("click", function (e) {
      //Se lee el id del button
      if (e.target.classList.contains("button")) {
        const id = Number(e.target.id);
        //Se manda una solicitud a la bd
        fetch("./php/datos_menu.php")
          .then((response) => response.json())
          .then((menu) => {
            //Trae el plato que tenga el mismo id que el button del menu
            const product_find = menu.find((product) => product.id === id);
            //Si el producto no se encuentra en el cart, procede...
            if (!cart[product_find.id]) {
              //Esto se hace para no almacenar platillos repetidos en el slide
              cart[product_find.id] = product_find;
              count++;
              notification_nav++;
              //Suma los precios de los productos seleccionados
              precio_total += product_find.price;
              //Almacenamos los datos en el navegador (persistencia)
              window.localStorage.setItem("notificacion", notification_nav);
              window.localStorage.setItem("cart", JSON.stringify(cart));
              window.localStorage.setItem("contador", count);
              window.localStorage.setItem("p_total", precio_total);
              //Mostramos el producto en el slide
              print_product();
            }
            //Mostrar en el carrito, la cantidad de productos a comprar
            notificar.forEach((el) => (el.innerHTML = notification_nav));
          })
          .catch((error) => console.error("Error fetching menu:", error));
      }
    });
  }
}
//Codigo html que se agregará para mostrarlo en el slide
function print_product() {
  let html = "";
  html += `
    <div class="container_cart_content">     
        <h3>Carrito de Compras <span id="quantity_cart">${count}</span></h3>
        <div class="cart_list">`;
  for (const product in cart) {
    //Se traen los siguientes valores del cart
    const { src, price, title, description, alt, id, amount } = cart[product];
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
        <div>
            <p>Total</p>
            <span>S/. ${precio_total}</span>
        </div>
        <button>Pedir</button>
    </div>
    `;
  //Mostraremos la carta en el slide
  slide.innerHTML = html;
}

function in_slide() {
  slide = document.querySelector(".container_cart");
  slide.addEventListener("click", function (e) {
    //Cuando se presiona el icono de aumentar
    if (e.target.classList.contains("bx-plus")) {
      let id = Number(e.target.id);
      if (cart[id].amount === 10) {
        return alert("Limite máximo 10 productos");
      }
      //Se aumenta la cantidad del producto
      valor = cart[id].amount++;
      //Se aumenta el numero de productos que se van a comprar
      count++;
      notification_nav++;
      //Es la acumulación de la suma de los precios de los productos seleccionados, en el slide.
      //Esta variable ya viene con un valor almacenado. Es el precio del platillo agregado al slide.
      precio_total += cart[id].price;

      metodos_generales();
    }
    //Cuando se presiona el icono de disminuir
    if (e.target.classList.contains("bx-minus")) {
      let id = Number(e.target.id);
      if (cart[id].amount <= 1) {
        const eleccion = confirm("¿Deseas eliminar el platillo?");
        if (eleccion) {
          precio_total -= cart[id].price * cart[id].amount;
          delete cart[id];
          count--;
          notification_nav--;

          window.localStorage.setItem("notificacion", notification_nav);
          window.localStorage.setItem("contador", count);
          window.localStorage.setItem("cart", JSON.stringify(cart));
          print_product();
          return;
        }
      } else {
        cart[id].amount--;
        count--;
        notification_nav--;
        precio_total -= cart[id].price;
      }

      metodos_generales();
    }
    //Cuando se presiona el icono de eliminar
    if (e.target.classList.contains("bx-x")) {
      const id = Number(e.target.id);

      precio_total -= cart[id].price * cart[id].amount;
      count -= cart[id].amount;
      notification_nav -= cart[id].amount;
      delete cart[id];

      metodos_generales();
    }
  });
}
const metodos_generales = () => {
  window.localStorage.setItem("p_total", precio_total);
  window.localStorage.setItem("notificacion", notification_nav);
  notificar.forEach((el) => (el.innerHTML = notification_nav));
  window.localStorage.setItem("contador", count);
  window.localStorage.setItem("cart", JSON.stringify(cart));
  print_product();
};

add_product();
print_product();
in_slide();
metodos_generales();
