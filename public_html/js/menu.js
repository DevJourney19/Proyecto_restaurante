const fetchInfo = async () => {
    let menu;
    await fetch("./php/datos_menu.php")
            .then((response) => response.json())
            .then((data) => {
                // 'data' es la variable $menu de PHP convertida a un objeto JavaScript
                menu = data;
            })
            .catch((error) => console.error("Error:", error));
    return menu;
};

const seeMore = async () => {
    const containerMenu = document.querySelector("#menu");
    const menu = await fetchInfo();
    let cardsHTML = "";

    menu.forEach((item) => {
        let starsHTML = "";
        for (let i = 0; i < item["stars"]; i++) {
            starsHTML += `<i class="bx bxs-star" style="color: #ffb100"></i>`;
        }

        cardsHTML += `
      <div class="card">
        <div>
          <div class="container_img">
            <img src=${item["src"]} alt=${item["alt"]} class="card_img" style="width: 95px; height: 100px" />
          </div>
          <div class="card_inner">
            <div class="description">
              <h4>${item["title"]}</h4>
              <p>${item["description"]}</p>
            </div>
            <div class="review_starts">
              ${starsHTML}
            </div>
          </div>
          <div class="price">
            <span>S/ ${item["price"]}</span>
            <button type="submit">Agregar</button>
          </div>
        </div>
      </div>
    `;
    });
    containerMenu.innerHTML = `<div class="menu_cards">${cardsHTML}</div>`;
};

const filtrarPlatos = async (categoria, event) => {
    event.preventDefault();
    const containerMenu = document.querySelector("#menu");
    const menu = await fetchInfo();
    let cardsHTML = "";

    menu.forEach((item) => {
        if (item["type"] === categoria) {
            let starsHTML = "";
            for (let i = 0; i < item["stars"]; i++) {
                starsHTML += `<i class="bx bxs-star" style="color: #ffb100"></i>`;
            }
            cardsHTML += `
        <div class="card">
          <div>
            <div class="container_img">
              <img src=${item["src"]} alt=${item["alt"]} class="card_img" style="width: 95px; height: 100px" />
            </div>
            <div class="card_inner">
              <div class="description">
                <h4>${item["title"]}</h4>
                <p>${item["description"]}</p>
              </div>
              <div class="review_starts">
                ${starsHTML}
              </div>
            </div>
            <div class="price">
              <span>S/ ${item["price"]}</span>
              <button type="submit">Agregar</button>
            </div>
          </div>
        </div>
      `;
        }
    });
    containerMenu.innerHTML = `<div class="menu_cards">${cardsHTML}</div>`;
};

// Selecciona todos los elementos <a>
const links = document.querySelectorAll("a.category_item");

links.forEach((link) => {
    link.onclick = function (event) {
        // Previene la navegación
        event.preventDefault();

        // Elimina la clase 'category_active' de todos los elementos <a>
        links.forEach((link) => {
            link.classList.remove("category_active");
        });

        // Agrega la clase 'category_active' al elemento que fue clicado
        this.classList.add("category_active");
        if (this.dataset.categoria !== "Todo") {
            filtrarPlatos(this.dataset.categoria, event);
        } else {
            seeMore();
        }
    };
});
