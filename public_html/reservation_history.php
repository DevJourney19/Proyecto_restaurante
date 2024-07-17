<?php
include 'php/util/connection.php';

include 'php/util/validar_entradas.php';
validar_entrada("reservations.php");
//id del usuario registrado (alt + shift + (minus/plus))

$id = $_SESSION['id'];
//Buscar si el usuario registrado ha hecho una reservacion
$sql = "SELECT * FROM reservation where client_id = '$id'";

try {
    conectar();
    $registro = consultar($sql);
    desconectar();
    $id_reservation = null;
    //Se cuenta si la cantidad de registros del cliente existe en reservaciones
    if (count($registro) > 0) {
        //Inventamos una llave para poder mostrar los registros de reservaciones de los clientes
        //si en caso hicieron por lo menos un pedido
        $_SESSION['id_reservation'] = "reservado";
        $id_reservation = $_SESSION['id_reservation'];
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
        <?php include 'fragments/head_links.php'; ?>
    </head>

    <body>
        <header>
            <?php include 'fragments/nav.php'; ?>
        </header>
        <main class="container my-5">
            <div class="title_section">
                 <h2>Historial de Reservaciones <span><i class='bx bx-food-menu' ></i></span></h2>
            </div>
            <?php if ($id_reservation === "reservado"): ?>
               <!-- <div class="row" >-->
               <div class="table-responsive col-12 " style="scrollbar-width: thin;">
                        <table class="table">
                            <thead class="bg-success text-light">
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
                                    <th colspan="2" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($registro as $r) : ?>
                                    <tr>
                                        <td><?= $r['fullname'] ?></td>
                                        <td><?= $r['consult_type'] ?></td>
                                        <td><?= $r['email'] ?></td>
                                        <td><?= $r['phone_number'] ?></td>
                                        <td><?= $r['companions'] ?></td>
                                        <td><?= $r['date'] ?></td>
                                        <td><?= $r['time'] ?></td>
                                        <td><?= $r['message'] ?></td>
                                        <td><?= $r['location_id'] ?></td>
                                        <td class="text-center">
                                            <a href="reservations.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil"></i>
                                                Editar
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="php/procesar_eliminar.php?id=<?= $r['id'] ?>" 
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('¿Deseas eliminar?')">
                                                <i class="bi bi-trash"></i>
                                                Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <h3 class="py-3">No se realizaron reservaciones...</h3>
            <?php endif; ?>
            <a class="send" href="reservations.php" style="text-decoration: underline transparent">Regresar</a>
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
