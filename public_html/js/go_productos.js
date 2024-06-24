let slide = document.querySelector(".container_cart");
let cart = {};
let count = 0;
let cantidad_producto = 0;
let total = 0;
function add_product() {
    const productos_html = document.querySelector(".menu");
    //Obtenemos la informacion que se almacenó en el navegador. Si es la primera vez, se validará con el valor 0
    cart = JSON.parse(window.localStorage.getItem('cart')) || {};
    count = parseInt(window.localStorage.getItem('contador')) || 0; // Obtener contador desde localStorage
//    cantidad_producto = parseInt(window.localStorage.getItem('cantidad')) || 0;
    //Añadimos que los botones de las cards de los productos, permitan llevar ese elemento al slide.
    productos_html.addEventListener("click", function (e) {
        if (e.target.classList.contains("button")) {
            const id = Number(e.target.id);
            fetch('./php/datos_menu.php')
                    .then(response => response.json())
                    .then(menu => {
                        const product_find = menu.find(product => product.id === id);
                        if (!cart[product_find.id]) {
                            cart[product_find.id] = product_find;
                            count++;

                            //Almacenamos los datos en el navegador (persistencia)
                            window.localStorage.setItem('cart', JSON.stringify(cart));
                            window.localStorage.setItem('contador', count); // Guardar contador en localStorage
                        }
                        print_product();
                    })
                    .catch(error => console.error('Error fetching menu:', error));
        }
    });
}
//Codigo html que se agregará para mostrarlo en el slide
function print_product() {
    let html = "";
    html += `
    <div class="container_cart_content">     
        <h3>Carrito de Compras <span id="quantity_cart">${count}</span></h3>
<div class="cart_list">`;
    for (const product in cart) {
        const {src, price, title, description, alt, id, amount} = cart[product];
        html += `<div class="cart_list_card" id="s">
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
                    <button >
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
    <div class="card_total">
        <div>
            <p>Total</p>
            <span>S/.10.00</span>
        </div>
        <button>Pedir</button>
    `;
    //Mostraremos la carta en el slide
    slide.innerHTML = html;
}
add_product();
print_product();
in_slide();

function in_slide() {
    //Incrementar, decrementar o elimina el producto del slide
    //Obtenemos la clase del slide
    slide = document.querySelector(".container_cart");
    slide.addEventListener("click", function (e) {
        if (e.target.classList.contains('bx-plus')) {

            let id = Number(e.target.id);
            if (cart[id].amount === 10) {
                return alert("Limite máximo 10 productos");
            }
            console.log(cart[id].amount++);

            print_product();

        }
        if (e.target.classList.contains("bx-minus")) {
            let id = Number(e.target.id);
            if (cart[id].amount === 1) {

                if (confirm("¿Deseas eliminar el platillo?")) {
                    
                    delete cart[id];
                    count--;
                    print_product();
                    window.localStorage.setItem("contador", count);
                    return window.localStorage.setItem("cart", JSON.stringify(cart));
                                       
                }else{
                    console.log("no se elimino");
                }
            }
            console.log(cart[id].amount--);
            window.localStorage.setItem("cart", JSON.stringify(cart));
            print_product();
        }
        if (e.target.classList.contains("bx-x")) {
            const id = Number(e.target.id);
            delete cart[id];
            count--;
        }
        window.localStorage.setItem("cart", JSON.stringify(cart));
        print_product();
    });

}