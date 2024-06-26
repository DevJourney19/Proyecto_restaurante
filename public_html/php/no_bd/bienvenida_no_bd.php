<?php
//Si ingreso sin haber ingresado el usuario entonces no me permitirá estar en esta página

if (!isset($_SESSION['usuario'])) {
    $titulo = "<span class='restaurant_name'>La Trattoria Secreta</span>";
} else {
    $user = $_SESSION['usuario'];
}
include '../verify_session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>La Trattoria Secreta | Home</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link rel="stylesheet" href="../../css/home.css" />
        <link rel="stylesheet" href="../../css/main.css" />
    </head>
    <body class="bg-black">
        <header>
            <nav class="navbar navbar-expand-xl pt-2 px-4">
                <div class="container-fluid">
                    <span><img src="../../assets/img/logo.png" alt="logo"/></span><h1 class="titulo">
                        <?php
                        echo $titulo;
                        ?>
                    </h1>
                </div>
            </nav>
        </header>
        <main class="main_bienvenida">
            <!--<!-- Agregar imagen con respecto a los comensales  -->
            <img class="img_bienvenida" src="../../assets/img/mov_bienvenida.jpg" alt="imagen_bienvenida"/>
            <div class="texto_1">
                <div class="cuadrito_texto_bienvenida">
                    <p class="p1_bienvenida text-light" style="font-size: 32px">¡Bienvenid@!</p>
                    <p class="p2 text-warning"><?php echo "Admin" ?></p>
                    <p class="mensajito_bienvenida" style="color: white;" >Gracias por unirte a La Trattoria Secreta. Estamos 
                        emocionados de compartir nuestros deliciosos platos variados contigo. ¡Disfruta de una experiencia 
                        culinaria inolvidable!</p>
                    <p class="p3">¡Vamos al home!</p>
                    <a class="button_menu" href="../../index.php?message=true">Home</a>
                </div>
            </div>
        </main>
        <footer class="index_footer">
            <div class="contenedor_curve_bienvenida">
                <div class="redes_bienvenido">
                    <a href="https://www.facebook.com/" target="blank"><i class="bx bxl-facebook-circle"></i></a>
                    <a href="https://www.instagram.com/" target="blank"><i class="bx bxl-instagram-alt"></i></a>
                    <a href="https://www.whatsapp.com/?lang=es_LA" target="blank"><i class="bx bxl-whatsapp"></i></a>
                </div>
                <div class="derechos">
                    &copy; 2024 - La Trattoria Secreta
                </div>
                <div class="elemento_amarillo_bienvenida"></div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!--<script src="../.././js/login_signup.js"></script>-->
        <script src="../../js/active_links.js"></script>

    </body>
</html>      