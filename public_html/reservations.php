<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>La Trattoria Secreta | Reservations</title>
  <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
  <link rel="stylesheet" href="css/reservations.css" />
  <link rel="stylesheet" href="css/form.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
          <a href="menu.php"><i class="bx bx-cart"></i></a>
          <a class="user_login">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="menu.php" class="nav-link">Menu</a>
            </li>
            <li class="nav-item">
              <a href="location.php" class="nav-link">Location</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-light active">Reservations</a>
            </li>
          </ul>
        </div>
        <div class="nav_icons icons_xl">
          <a href="menu.php"><i class="bx bx-cart"></i></a>
          <a class="user_login">
          </a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="title_section">
      <h3>Ponte en contacto con nosotros</h3>
      <p>
        Estamos aquí para ayudar, consulta informacion sobre nosotros y
        reservaciones
      </p>
    </div>
    <div class="container_res">
      <section>
        <form method="POST" action="./php/procesar_reservacion.php">
          <div class="double_input">
            <div>
              <label for="full_name"> Nombre Completo </label>
              <input title="nombre completo para contacto" type="text" placeholder="Enter your full name" name="full_name" id="full_name" required />
            </div>
            <div>
              <label for="partners"> Acompañantes* </label>
              <input name="partners" title="numero de acompañantes" type="number" placeholder="# of people" min="1" max="10" id="partners" required />
            </div>
          </div>
          <div class="double_input">
            <div>
              <label for="email"> Email </label>
              <input name="email" title="email para contacto" type="text" placeholder="Enter your email" id="email" required />
            </div>
            <div>
              <label for="phone_number"> Número celular </label>
              <input name="phone_number" title="numero de telefono para contacto" type="text" pattern="[0-9]{7,9}" placeholder="914703631" id="phone_number" required />
            </div>
          </div>
          <div>
            <label for="day_selected">
              Selecciona el dia y hora que planeas asistir*
            </label>
            <div class="double_input">
              <div>
                <input title="hora de la reserva" type="time" id="time" name="time_selected" />
              </div>
              <div>
                <input name="day_selected" title="dia de la reserva" type="date" id="day_selected" />
              </div>
            </div>
          </div>
          <div>
            <fieldset>
              <legend>Mensaje adicional</legend>
              <!--no se encontro atributo para accesibilidad-->
              <textarea name="message" rows="4" cols="20" placeholder="Enter the message..."></textarea>
            </fieldset>
          </div>
          <div class="final_form">
            <button type="submit">Send Message</button>
            <p>(* = opcional si solo desea contactar)</p>
          </div>
        </form>
      </section>
      <section class="contact_info">
        <h4>Contact Info</h4>
        <div>
          <i class="bx bxs-phone"></i>
          <p>+51 914703631</p>
        </div>
        <div>
          <i class="bx bxs-envelope"></i>
          <p>hello@example.com</p>
        </div>
        <div>
          <i class="bx bxs-map-pin"></i>
          <p>189 San Isidro, Lima - Perú</p>
        </div>
      </section>
    </div>
  </main>
  <footer class="footer_reservation">
    <div class="footer_desc">
      <img src="assets/img/logo.png" alt="logo" class="Logo de la Trattoria Secreta" width="70" heigth="70" />
      <p>
        Nos esforzamos para ofrecerle una experiencia gastronómica
        excepcional, donde cada plato es una obra maestra de sabor, calidad y
        dedicación, saborea la excelencia en cada bocado.
      </p>
    </div>
    <div class="footer_icons white">
      <a href="https://www.facebook.com/?locale=es_LA" target="blank"><i class="bx bxl-facebook-circle"></i></a>
      <a href="https://www.instagram.com/" target="blank"><i class="bx bxl-instagram"></i></a>
      <a href="https://www.tiktok.com/es/" target="blank"><i class="bx bxl-tiktok"></i></a>
    </div>
    <div class="contenedor_curve">
      <div class="curve_footer"></div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./js/login_signup.js"></script>
</body>
</html>