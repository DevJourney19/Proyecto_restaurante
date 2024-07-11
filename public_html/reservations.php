<!DOCTYPE html>
<html lang="en">

    <head>
        <title>La Trattoria Secreta | Reservations</title>
        <link rel="stylesheet" href="css/reservations.css" />
        <link rel="stylesheet" href="css/form.css" />
        <link rel="stylesheet" href="css/main.css" />
        <?php include 'fragments/head_links.php'; ?>
    </head>

    <body>
        <header>
            <?php include 'fragments/nav.php'; ?>
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
                    <form method="get" action="./php/procesar_consulta.php" onsubmit="checkRequired(event);">
                        <div class="double_input">
                            <div>
                                <label for="full_name"> Nombre Completo </label>
                                <input title="nombre completo para contacto" type="text" placeholder="Ingrese su nombre" name="full_name" id="full_name" required />
                            </div>
                            <div>
                                <label for="consulta">Tipo de Consulta</label>
                                <select name="consulta" id="consulta" onchange="checkType();">
                                    <option value="mensaje">Mensajes</option>
                                    <option value="reservacion">Reservación</option>
                                </select>
                            </div>
                        </div>
                        <div class="double_input">
                            <div>
                                <label for="email">Correo electrónico</label>
                                <input name="email" title="email para contacto" type="text" placeholder="Ingrese correo" id="email" />
                            </div>
                            <div>
                                <label for="phone_number"> Número celular </label>
                                <input maxlength="9" name="phone_number" title="número de telefono para contacto" type="text" pattern="[0-9]{7,9}" placeholder="914703631" id="phone_number" />
                            </div>
                        </div>
                        <div id="reservation" class="reservation_consult hidden">
                            <div>
                                <label for="location">Ubicacion*</label>
                                <select name="location" id="location">
                                    <option value="Miraflores">La Trattoria Secreta Miraflores</option>
                                    <option value="Surco">La Trattoria Secreta Santiago de Surco</option>
                                    <option value="San Isidro">La Trattoria Secreta San Isidro</option>
                                </select>
                            </div>
                            <div>
                                <label for="partners"> Acompañantes* </label>
                                <input name="partners" title="numero de acompañantes" type="number" placeholder="# of people" min="1" max="10" id="partners" />
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
                        </div>
                        <div class="mensaje_consult">
                            <fieldset>
                                <legend>Mensaje adicional</legend>
                                <!--no se encontro atributo para accesibilidad-->
                                <textarea id="message" name="message" rows="4" cols="20" placeholder="Ingrese el mensaje..."></textarea>
                            </fieldset>
                        </div>
                        <p id="error" class="error hidden"></p>
                        <div class="final_form">
                            <button class="send" type="submit">Enviar Mensaje</button>
                        </div>
                    </form>
                </section>
                <section class="contact_info">
                    <h4>Información de Contacto</h4>
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
            <div id="container_cart" class="container_cart hidden">
            </div>
        </main>
        <footer class="footer_reservation">
            <div class="footer_desc">
                <img src="assets/img/logo.png" alt="logo" class="Logo de la Trattoria Secreta" style="width:70px; height:70px" />
                <p>
                    Nos esforzamos para ofrecerle una experiencia gastronómica
                    excepcional, donde cada plato es una obra maestra de sabor, calidad y
                    dedicación, saborea la excelencia en cada bocado.
                </p>
            </div>
            <?php include 'fragments/footer.php'; ?>
            <div class="contenedor_curve">
                <div class="curve_footer"></div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="./js/login_signup.js"></script>
        <script src="./js/consultas.js"></script>
        <script src="js/go_productos.js"></script>
    </body>
</html>