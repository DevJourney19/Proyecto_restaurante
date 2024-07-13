<!DOCTYPE html>
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
                <!-- comment 
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
                -->
                <?php
                $locations = [
                    [
                        "name" => "La Trattoria Secreta Miraflores",
                        "address" => "Av La colmena-Bellavista, Garcia Nelaza 1948 , Miraflores, Perú",
                        "link" => "https://maps.app.goo.gl/aJT9f5cvbGoGZTDf6"
                    ],
                    [
                        "name" => "La Trattoria Secreta Santiago de Surco",
                        "address" => "Av Paraiso, Mendoza 1568 , Santiago de Surco, Perú",
                        "link" => "https://maps.app.goo.gl/aJT9f5cvbGoGZTDf6"
                    ],
                    [
                        "name" => "La Trattoria Secreta San Isidro",
                        "address" => "Av Primavera, Magna Loza 4157 , San Isidro, Perú",
                        "link" => "https://maps.app.goo.gl/aJT9f5cvbGoGZTDf6"
                    ]
                ];
                ?>

                <div class="boxes">
                    <?php if (is_array($locations)): ?>
                        <?php foreach ($locations as $location): ?>
                            <div class="local_box">
                                <div class="placeslocals_nombre">
                                    <h4><?php echo htmlspecialchars($location["name"]); ?></h4>
                                    <p><?php echo htmlspecialchars($location["address"]); ?></p>
                                </div>
                                <a href="<?php echo htmlspecialchars($location["link"]); ?>" target="_blank" class="local_link">
                                    <i class="bx bx-current-location"></i>
                                    ¿Comó llegar?
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