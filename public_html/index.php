<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <title>La Trattoria Secreta | Home</title>
        <?php include 'fragments/head_links.php'; ?>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/home.css" />
    </head>

    <body class="bg-black">
        <header>
            <!-- ESTOY DENTRO DEL INDEX.PHP -->
            <nav class="navbar navbar-expand-xl pt-4 px-4">
                <div class="container-fluid">
                    <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bx bx-menu-alt-left"></i>
                    </button>
                    <h1 class="titulo">
                        La Trattoria Secreta
                    </h1>
                    <div class="nav_icons icons_initial">
                        <button onclick="open_cart();" class="btn-cart"><i class="bx bx-cart"></i><span class="notification"></span></button>
                        <a class="user_login">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse primera_ul" id="navbarTogglerDemo01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light active_home">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a href="about.php" class="nav-link">Sobre nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a href="menu.php" class="nav-link">Menú</a>
                            </li>
                            <li class="nav-item">
                                <a href="location.php" class="nav-link">Ubicación</a>
                            </li>
                            <li class="nav-item">
                                <a href="reservations.php" class="nav-link">Reservación</a>
                            </li>
                        </ul>
                    </div>
                    <!-- <a class="login" href="php/close_session.php"><i class='bx bx-exit'></i></a> -->
                    <div class="nav_icons icons_xl">
                        <button onclick="open_cart();" class="btn-cart"><i class="bx bx-cart"></i><span class="notification"></span></button>
                        <a class="user_login">
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="texto_1">
                <p class="p1 text-light">¿Hambriento?</p>
                <p class="p2 text-light">¡No esperes más!</p>
                <p class="p3">Vamos a ordenar</p>
                <a class="button_menu" href="menu.php">Revisar Menú</a>
            </div>

            <div class="food_1">
                <img src="assets/img/food_1.png" class="img_top" alt="Plato de tostada con huevo y palta" />
            </div>

            <div class="redes">
                <a href="https://www.facebook.com/" target="blank"><i class="bx bxl-facebook-circle"></i></a>
                <a href="https://www.instagram.com/" target="blank"><i class="bx bxl-instagram-alt"></i></a>
                <a href="https://www.whatsapp.com/?lang=es_LA" target="blank"><i class="bx bxl-whatsapp"></i></a>
            </div>
            <div id="container_cart" class="container_cart hidden">
            </div>
        </main>
        <footer class="index_footer">
            <div class="boxes_footer">
                <div>
                    <h3><i class="bx bxs-trophy"></i> Mejor Restaurante</h3>
                    <p>
                        Nuestro restaurante ha sido premiado por 5to año consecutivo como
                        mejor restaurante nacional.
                    </p>
                </div>
                <div>
                    <h3><i class="bx bxs-medal"></i> Mejores Cheffs</h3>
                    <p>
                        Nuestro restaurante es reconocido por la gran categoría que hay por
                        parte de los chefs.
                    </p>
                </div>
            </div>

            <?php if (!isset($_SESSION['acceso'])) : ?>
                <div class="dir_registrarse_login">
                    <h4>
                        ¡Hola! ¿Quieres sacar el máximo provecho de nuestro sitio? Regístrate
                        o inicia sesión para comenzar.
                    </h4>
                    <div>
                        <a href="login_signup.php">Vamos</a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="contenedor_curve_home">
                <div class="elemento_amarillo"></div>
            </div>

        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="./js/login_signup.js"></script>
        <script src="./js/go_productos.js"></script>
    </body>

</html>