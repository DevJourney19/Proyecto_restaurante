<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <title>La Trattoria Secreta | Menu</title>
        <link rel="stylesheet" href="css/menu.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-xl pt-4 px-4">
                <div class="curve_header"></div>
                <div class="container-fluid">
                    <button
                        class="navbar-toggler text-light"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01"
                        aria-controls="navbarTogglerDemo01"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="bx bx-menu-alt-left"></i>
                    </button>
                    <span class="restaurant_name">La Trattoria Secreta</span>
                    <div class="nav_icons icons_initial">
                        <a href="menu.php"><i class="bx bx-cart"></i></a>
                        <a class="login" href="php/close_session.php"><i class='bx bx-exit'></i></a>
                        <a class="logout" href="php/close_session.php"><i class='bx bx-exit'></i></a>
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
                                <a href="#" class="nav-link text-light active">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a href="location.php" class="nav-link">Location</a>
                            </li>
                            <li class="nav-item">
                                <a href="reservations.php" class="nav-link">Reservations</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav_icons icons_xl">
                        <a href="menu.php"><i class="bx bx-cart"></i></a>
                        <a class="login" href="php/close_session.php"><i class='bx bx-exit'></i></a>
                        <a class="logout" href="php/close_session.php"><i class='bx bx-exit'></i></a>
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
                        <li><a href="" class="category_active category_item">Todos</a></li>
                        <li><a href="" class="category_item">Platos Principales</a></li>
                        <li><a href="" class="category_item">Ensaladas</a></li>
                        <li><a href="" class="category_item">Aperitivos</a></li>
                        <li><a href="" class="category_item">Bebidas</a></li>
                        <li><a href="" class="category_item">Postres</a></li>
                        </ul>
                    </div>
                </div>
                <section class="menu">
                    <div class="menu_cards">
                        <div class="card">
                            <div>
                                <div class="container_img">
                                    <img
                                        src="assets/img/Lomo-Saltado-1.png"
                                        alt="Plato tipico Lomo Saltado"
                                        class="card_img"
                                        style="width: 120px; height: 120px" />
                                </div>
                                <div class="card_inner">
                                    <div class="description">
                                        <h4>Lomo Saltado</h4>
                                        <p>
                                            Delicioso plato peruano que combina tiernos trozos de lomo
                                            de res con cebolla, tomate y papas fritas..
                                        </p>
                                    </div>
                                    <div class="review_starts">
                                        <i class="bx bxs-star" style="color: #ffb100"></i>
                                        <i class="bx bxs-star" style="color: #ffb100"></i>
                                        <i class="bx bxs-star" style="color: #ffb100"></i>
                                        <i class="bx bxs-star" style="color: #ffb100"></i>
                                        <i class="bx bxs-star" style="color: #ffb100"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <span>S/ 25.00</span>
                                <button type="submit">Agregar</button>
                            </div>
                        </div>
                        <div class="card">
                            <div>
                                <div class="container_img">
                                    <img
                                        src="assets/img/CEVICHE.png"
                                        alt="Plato tipico Ceviche"
                                        class="card_img"
                                        style="width: 100px; height: 100px" />
                                </div>
                                <div class="card_inner">
                                    <div class="description">
                                        <h4>Ceviche de Pescado</h4>
                                        <p>
                                            Fresco pescado marinado en jugo de limón con cebolla roja,
                                            cilantro y ají limo, acompañado de camote y maíz choclo
                                        </p>
                                    </div>
                                    <div class="review_starts">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <span>S/ 30.00</span>
                                <button type="button">Agregar</button>
                            </div>
                        </div>
                        <div class="card">
                            <div>
                                <div class="container_img">
                                    <img
                                        src="assets/img/rocoto.png"
                                        alt="Plato tipico Rocoto Relleno"
                                        class="card_img"
                                        style="width: 120px; height: 120px" />
                                </div>
                                <div class="card_inner">
                                    <div class="description">
                                        <h4>Rocoto Relleno</h4>
                                        <p>
                                            Rocotos peruanos rellenos con una mezcla de carne molida,
                                            cebolla, aceitunas y especias, gratinados con queso.
                                        </p>
                                    </div>
                                    <div class="review_starts">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <span>S/ 28.00</span>
                                <button type="submit">Agregar</button>
                            </div>
                        </div>
                        <div class="card">
                            <div>
                                <div class="container_img">
                                    <img
                                        src="assets/img/anticucho.png"
                                        alt="Plato tipico Anticuchos"
                                        class="card_img"
                                        style="width: 130px; height: 120px" />
                                </div>
                                <div class="card_inner">
                                    <div class="description">
                                        <h4>Anticuchos</h4>
                                        <p>
                                            Brochetas de corazón de res marinadas en aji panca y
                                            comino, asadas a la parrilla y acompañadas de papas y
                                            choclo.
                                        </p>
                                    </div>
                                    <div class="review_starts">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <span>S/ 18.00</span>
                                <button type="submit">Agregar</button>
                            </div>
                        </div>
                        <div class="card">
                            <div>
                                <div class="container_img">
                                    <img
                                        src="assets/img/GvCzc4tnpNMo8wPeB-1200-1200.webp"
                                        alt="Plato tipico la Parihuela"
                                        class="card_img"
                                        style="width: 120px; height: 120px" />
                                </div>
                                <div class="card_inner">
                                    <div class="description">
                                        <h4>Parihuela</h4>
                                        <p>
                                            Sopa de mariscos y pescado con tomate, cebolla, ají y
                                            cilantro, servida con arroz blanco y yuca.
                                        </p>
                                    </div>
                                    <div class="review_starts">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <span>S/ 35.00</span>
                                <button type="submit">Agregar</button>
                            </div>
                        </div>
                        <div class="card">
                            <div>
                                <div class="container_img">
                                    <img
                                        src="assets/img/suspiro.gif"
                                        alt="Plato tipico Suspiro a la limeña"
                                        class="card_img"
                                        style="width: 95px; height: 100px" />
                                </div>
                                <div class="card_inner">
                                    <div class="description">
                                        <h4>Suspiro a la Limeña</h4>
                                        <p>
                                            Delicioso postre hecho a base de una suave crema de leche
                                            y yema de huevo, cubierta con merengue y canela.
                                        </p>
                                    </div>
                                    <div class="review_starts">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <span>S/ 15.00</span>
                                <button type="submit">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit">See All</button>
                </section>
            </div>
        </main>
        <footer>
            <div class="footer_icons white">
                <a href="https://www.facebook.com/?locale=es_LA" target="blank"
                   ><i class="bx bxl-facebook-circle"></i
                    ></a>
                <a href="https://www.instagram.com/" target="blank"
                   ><i class="bx bxl-instagram"></i
                    ></a>
                <a href="https://www.tiktok.com/es/" target="blank"
                   ><i class="bx bxl-tiktok"></i
                    ></a>
            </div>
        </footer>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>
</html>