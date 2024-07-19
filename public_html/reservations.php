<?php
include 'php/util/connection.php';
include 'php/util/reg_reservation.php';
session_start();
$sql = "SELECT * FROM location";

try {
    conectar();
    $resultado = consultar($sql);
    $locaciones = $resultado;
    unset($resultado);
    desconectar();

    $id_reservar = "";
    //Si le dimos clic en "actualizar" nos aparecera un valor del id -> id=17
    //Si se encuentra "id" en la url
    if (isset($_GET['id'])) {
        $titulo = "Actualizar mensaje/reservación";
        //Traemos el valor del id de la reservacion
        $id_reservar = $_GET['id']; //36 ID Reservacion

        /**
         * EL PROBLEMA DE QUE EL ARRAY EN CIERTOS CASOS SEA NULL ES PORQUE NO SE ENCONTRO SU
         * LOCATION ID DE LA CONSULTA sql.
         */
        //Hacer un select para traer los valores de esa reservacion en especifico
        $sql = "SELECT * FROM reservation "
            . "where reservation.id = '$id_reservar'";
        $sql_location = "SELECT * FROM reservation INNER JOIN location on "
            . "reservation.location_id = location.id "
            . "where reservation.id = '$id_reservar'";
        conectar();

        $registrar_location = consultar($sql_location);
        $reg_reservation = consultar($sql);
        //Traer los datos del usuario registrado
        $fullname = reservado($reg_reservation, "fullname") ?? "";
        $consult_type = reservado($reg_reservation, "consult_type");
        $email = reservado($reg_reservation, "email");
        $phone = reservado($reg_reservation, "phone_number");
        $companions = reservado($reg_reservation, "companions");
        $date = reservado($reg_reservation, "date");
        $time = reservado($reg_reservation, "time");
        $message = reservado($reg_reservation, "message");
        $location_id = reservado($registrar_location, "id");
        $location_district = reservado($registrar_location, "district");
        $location_address = reservado($registrar_location, "address");

        unset($reg_reservation);
        desconectar();
    }
} catch (Exception $exc) {
    die($exc->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

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
            <h3>Ponte en contacto con nosotros </h3>
            <p>
                Estamos aquí para ayudar, consulta informacion sobre nosotros y
                reservaciones
            </p>
        </div>
        <div class="container_res">

            <section>
                <form method="get" action="php/procesar_agregar_editar.php" onsubmit="checkRequired(event)">
                    <div class="double_input">
                        <!-- Va a servir de mucha utilidad-->
                        <input type="hidden" name="id" value="<?= $id_reservar ?? "" ?>" />
                        <div>
                            <label for="full_name"> Nombre Completo </label>
                            <input title="nombre completo para contacto" type="text" placeholder="Ingrese su nombre" name="full_name" id="full_name" required value="<?= isset($_GET['id']) ? $fullname : '' ?>" />
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
                            <input name="email" title="email para contacto" type="text" placeholder="Ingrese correo" id="email" value="<?= isset($_GET['id']) ? $email : '' ?>" />
                        </div>
                        <div>
                            <label for="phone_number"> Número celular </label>
                            <input maxlength="9" name="phone_number" title="número de telefono para contacto" type="text" pattern="[0-9]{7,9}" placeholder="914703631" id="phone_number" value="<?= isset($_GET['id']) ? $phone : '' ?>" />
                        </div>
                    </div>
                    <div id="reservation" class="reservation_consult hidden">
                        <div>
                            <label for="location">Ubicacion*</label>
                            <select name="location" id="location">
                                <option value="<?= isset($_GET['id']) ? $location_id : '0' ?>"><?= isset($_GET['id']) ? $location_district . " - " . $location_address : 'Seleccionar Ubicación' ?></option>
                                <?php
                                foreach ($locaciones as $locacion) {
                                    echo "<option value='" . $locacion['id'] . "'>" . $locacion['district'] . " - " . $locacion['address'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="partners"> Acompañantes* </label>
                            <input name="partners" title="numero de acompañantes" type="number" placeholder="# of people" min="0" max="10" id="partners" value="<?= isset($_GET['id']) ? $companions : null ?>" />
                        </div>
                        <div>
                            <label for="day_selected">
                                Selecciona el dia y hora que planeas asistir*
                            </label>
                            <div class="double_input">
                                <div>
                                    <input title="hora de la reserva" type="time" id="time" name="time_selected" value="<?= isset($_GET['id']) ? $time : '' ?>" />
                                </div>
                                <div>
                                    <!-- Se debe escoger una fecha, no se debe traer con valores sin escoger -->
                                    <input name="day_selected" title="dia de la reserva" type="date" id="day_selected" value="<?= isset($_GET['id']) ? $date : '' ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mensaje_consult">
                        <fieldset>
                            <legend>Mensaje adicional</legend>
                            <!--no se encontro atributo para accesibilidad-->
                            <textarea id="message" name="message" rows="4" cols="20" placeholder="Ingrese el mensaje..."><?= isset($_GET['id']) ? $message : '' ?></textarea>
                        </fieldset>
                    </div>
                    <p id="error" class="error hidden"></p>
                    <div class="imposible">
                        <div class="final_form">
                            <button class="send" type="submit"><?= isset($_GET['id']) ? "Actualizar" : "Agregar Mensaje" ?></button>
                        </div>
                        <div class="history_form">
                            <a class="send" href="reservation_history.php"><?= isset($_GET['id']) ? "Cancelar" : "Ver Historial" ?></a>
                        </div>
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