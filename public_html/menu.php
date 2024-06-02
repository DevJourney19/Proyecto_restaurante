<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
  <title>La Trattoria Secreta | Menu</title>
  <link rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-xl pt-4 px-4">
      <div class="curve_header"></div>
      <div class="container-fluid">
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bx bx-menu-alt-left"></i>
        </button>
        <span class="restaurant_name">La Trattoria Secreta</span>
        <div class="nav_icons icons_initial">
          <a href="menu.html"><i class="bx bx-cart"></i></a>
          <a class="login" href="login_signup.html"><i class="bx bx-user"></i></a>
          <a class="logout" href="login_signup.html"><i class='bx bx-log-out'></i></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="index.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-light active">Menu</a>
            </li>
            <li class="nav-item">
              <a href="location.html" class="nav-link">Location</a>
            </li>
            <li class="nav-item">
              <a href="reservations.html" class="nav-link">Reservations</a>
            </li>
          </ul>
        </div>
        <div class="nav_icons icons_xl">
          <a href="menu.html"><i class="bx bx-cart"></i></a>
          <a class="login" href="login_signup.html"><i class="bx bx-user"></i></a>
          <a class="logout" href="login_signup.html"><i class='bx bx-log-out'></i></a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="title_section">
      <p><i class="bx bxs-food-menu"></i> Nuestro Menu</p>
      <h3>Prueba nuestros deliciosos Platos</h3>
    </div>
    <div class="container_menu">
      <div class="categories">
        <div class="nav_categories">
          <li><a data-categoria="Todo" href="#" class="category_active category_item">Todos</a></li>
          <li><a data-categoria="Principal" class="category_item">Platos Principales</a></li>
          <li><a data-categoria="Ensalada"  class="category_item">Ensaladas</a></li>
          <li><a data-categoria="Aperitivo" class="category_item">Aperitivos</a></li>
          <li><a data-categoria="Bebida" class="category_item">Bebidas</a></li>
          <li><a data-categoria="Postre"  class="category_item">Postres</a></li>
          </ul>
        </div>
      </div>
      <section id="menu" class="menu">
        <div class="menu_cards">
          <?php 
          ob_start();  // Inicia el control de salida
          require 'datosMenu.php';
          ob_end_clean();  // Termina el control de salida y descarta cualquier salida capturada
          ?>
          <?php
          $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;
          $items = array_slice($menu, 0, $limit);

          foreach ($items as $item) :
          ?>
            <div class="card">
              <div>
                <div class="container_img">
                  <img src="<?= $item['src'] ?>" alt="<?= $item['alt'] ?>" class="card_img" style="width: 95px; height: 100px" />
                </div>
                <div class="card_inner">
                  <div class="description">
                    <h4><?= $item['title'] ?></h4>
                    <p>
                      <?= $item['description'] ?>
                    </p>
                  </div>
                  <div class="review_starts">
                    <?php
                    for ($i = 0; $i < $item['stars']; $i++) {
                      echo '<i class="bx bxs-star" style="color: #ffb100"></i>';
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="price">
                <span>S/ <?= $item['price'] ?></span>
                <button type="submit">Agregar</button>
              </div>
            </div>
          <?php
          endforeach;
          ?>
        </div>
        <button type="button" id="btn_seeAll" onclick="seeMore()">See All</button>
      </section>
    </div>
  </main>
  <footer>
    <div class="footer_icons white">
      <a href="https://www.facebook.com/?locale=es_LA" target="blank"><i class="bx bxl-facebook-circle"></i></a>
      <a href="https://www.instagram.com/" target="blank"><i class="bx bxl-instagram"></i></a>
      <a href="https://www.tiktok.com/es/" target="blank"><i class="bx bxl-tiktok"></i></a>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./js/menu.js"></script>
</body>

</html>