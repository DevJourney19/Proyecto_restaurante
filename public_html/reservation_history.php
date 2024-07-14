<?php
//Si el usuario tiene el acceso = 12345 -> Me debería dejar entrar para poder realizar el pago

include_once 'php/util/connection.php';
include_once 'php/util/validar_pago.php';
$sql = "SELECT * FROM reservation";
try {
conectar();
$listado = consultar($sql);
desconectar();
#var_dump($listado);
} catch (Exception $exc) {
die($exc->getMessage());
}
?>

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
            <h2>Historial de Reservaciones <span><i class='bx bx-food-menu' ></i></span></h2>
            <div class="row">
                <div class="col-12">
                    <table style="border: 2px solid black">
                        <thead style="border: 2px solid black">
                            <tr>
                                <th>Full Name</th>
                                <th>Consult Type</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Companions</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Message</th>
                                <th>Location</th><!--Hacer un inner join - district-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listado as $r) : ?>
                            <tr>
                                <th><?= $r['fullname']?></th>
                            </tr>


                        </tbody>
                    </table>
                </div>
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

