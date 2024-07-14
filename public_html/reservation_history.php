<?php
//Si el usuario tiene el acceso = 12345 -> Me debería dejar entrar para poder realizar el pago

include 'php/util/connection.php';
include 'php/util/validar_entradas.php';
validar_entrada("reservations.php", "reservations");
//Si está vacio la tabla mostrar un alert de que no se agregó registros

/**
 * COMENTARIOS <-----------
 * 1. YA HICE LA CORRECCIÓN DEL SCRIPT, PARA PODER TENER LA LLAVE FORÁNEA DEL 
 * CLIENTE REGISTRADO Y PODER MOSTRAR DE ESTA MANERA CON RESPECTO A SU ID.
 * 
 * 
 */
$id = $_SESSION['id'];
//echo "El id essssssssssssssssssssssssssssssssssssssssssssssssssssssssssss: " . var_dump($id);

$email = $_SESSION['email'];
//echo "El email essssssssssssssssssssssssssssssssssssssssssssssssssssssssssss: " . $email;
$sql = "SELECT * FROM reservation where client_id = '$id'";
try {
//    $id_correo = $_SESSION['email']; //Obtiene el correo con el que se ha iniciado sesión

    conectar();
    $listado = consultar($sql); //ID_RES - NOMBRE - CORREO - DATE - TIME - LOCATION.ID
    //El campo foraneo de cliente es: client_id

    /**
     * SELECT * FROM reservation WHERE client_id= $id;
     * 
     */
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
            <div class="row" >
                <div class="table-responsive col-12 ">
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

                            <?php foreach ($listado as $r) : ?>
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
                                        <a href="categorias_form.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                            Editar
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="categoria_eliminar.php?id=<?= $c['id'] ?>" 
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
                <div>

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
