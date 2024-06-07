<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/location.css" />
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <title>La Septima Maravilla</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl pt-4 px-4">
            <div class="curve_header"></div>
            <div class="container-fluid">
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class='bx bx-menu-alt-left'></i>
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
                            <a href="#" class="nav-link text-light active">Location</a>
                        </li>
                        <li class="nav-item">
                            <a href="reservations.php" class="nav-link">Reservations</a>
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
        <div class="locals_title">
            <h2>Ubicación</h2>
        </div>
        <section>
            <div class="boxes">
                <div class="local_box">
                    <div class="placeslocals_nombre">
                        <h4>La Trattoria Secreta Miraflores</h4>
                        <p>
                            Av La colmena-Bellavista, Garcia Nelaza 1948 , miraflores, Perú
                        </p>
                    </div>
                    <a href="https://maps.app.goo.gl/aJT9f5cvbGoGZTDf6" target="blank" class="local_link">
                        <i class="bx bx-current-location"></i>
                        ¿Comó llegar?</a>
                </div>
                <div class="local_box">
                    <div class="placeslocals_nombre">
                        <h4>La Trattoria Secreta Santiago de Surco</h4>
                        <p>Av Paraiso, Mendoza 1568 , Santiago de Surco, Perú</p>
                    </div>
                    <a href="https://maps.app.goo.gl/aJT9f5cvbGoGZTDf6" target="blank" class="local_link">
                        <i class="bx bx-current-location"></i>
                        ¿Comó llegar?</a>
                </div>
                <div class="local_box">
                    <div class="placeslocals_nombre">
                        <h4>La Trattoria Secreta San Isidro</h4>
                        <p>Av Primavera, Magna Loza 4157 , San Isidro, Perú</p>
                    </div>
                    <a href="https://maps.app.goo.gl/aJT9f5cvbGoGZTDf6" target="blank" class="local_link">
                        <i class="bx bx-current-location"></i>
                        ¿Comó llegar?</a>
                </div>
            </div>
            <div class="iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62446.69422690843!2d-77.00754382134797!3d-11.980148814031805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c562b237b1ad%3A0x81b7bf88d50f89ff!2sUniversidad%20Tecnol%C3%B3gica%20Del%20Per%C3%BA!5e0!3m2!1ses-419!2spe!4v1713728009305!5m2!1ses-419!2spe" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer_icons white">
            <a href="https://www.facebook.com/?locale=es_LA" target="blank"><i class="bx bxl-facebook-circle"></i></a>
            <a href="https://www.instagram.com/" target="blank"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.tiktok.com/es/" target="blank"><i class="bx bxl-tiktok"></i></a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/login_signup.js" type="text/javascript"></script>
</body>

</html>