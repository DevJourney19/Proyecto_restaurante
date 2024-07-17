<!DOCTYPE html>
<?php
include 'php/util/connection.php';

$sql = "SELECT * FROM location";
try {
    conectar();
    $resultado = consultar($sql);
    $locations = $resultado;
    unset($resultado);
    desconectar();
} catch (Exception $exc) {
    die($exc->getMessage());
}
?>
<html lang="en">

    <head>
        <title>La Septima Maravilla</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/location.css" />

        <?php include 'fragments/head_links.php'; ?>
    </head>

    <body>
        <header>
            <?php include 'fragments/nav.php'; ?>
        </header>
        <main>
            <div class="locals_title">
                <h2>Ubicación</h2>
            </div>
            <section>
                <div class="boxes">
                    <?php if (!empty($locations)): ?>
                        <?php foreach ($locations as $location): ?>
                            <div class="local_box">
                                <div class="placeslocals_nombre">
                                    <h4> La Trattoria Secreta <?= htmlspecialchars($location["district"]) ?></h4>
                                    <p><?= htmlspecialchars($location["address"]) ?>, <?= htmlspecialchars($location["city"]) ?></p>
                                  
                                </div>
                                <a href="https://maps.google.com/?q=<?= urlencode($location["address"] . ", " . $location["city"]) ?>" target="_blank" class="local_link">
                                    <i class="bx bx-current-location"></i>
                                    ¿Cómo llegar?
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay localizaciones disponibles.</p>
                    <?php endif; ?>
                </div>


                <div class="iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62446.69422690843!2d-77.00754382134797!3d-11.980148814031805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c562b237b1ad%3A0x81b7bf88d50f89ff!2sUniversidad%20Tecnol%C3%B3gica%20Del%20Per%C3%BA!5e0!3m2!1ses-419!2spe!4v1713728009305!5m2!1ses-419!2spe" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
            <div id="container_cart" class="container_cart hidden">

            </div>
        </main>
        <footer>
            <?php include 'fragments/footer.php'; ?>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="js/login_signup.js"></script>
        <script src="js/go_productos.js"></script>
        <script src="js/menu.js"></script>
    </body>

</html>