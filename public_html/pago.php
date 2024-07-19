<?php
include_once 'php/util/connection.php';
include_once 'php/util/validar_entradas.php';
validar_entrada('login_signup.php', 'pago');

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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Trattoria Secreta | Pagos</title>
        <link rel="stylesheet" href="./css/pago.css">
        <?php include_once 'fragments/head_links.php'; ?>
    </head>
    <body>
        <main>
            <div class="cart">
                <img src="./assets/img/logo.png" alt="logo" class="logo">
                <h3 class="shopping_title">SHOPPING CART</h3>
                <div class="container_cart"></div>
            </div>
            <div class="payment">
                <h3 class="payment_title">PAYMENT</h3>
                <form id="formPago">
                    <div>
                        <select id="location" name="location" class="location">
                            <option id="first_option" value="">Selecciona la ubicacion mas cercana</option>
                            <?php
                            foreach ($locations as $location) {
                                echo "<option value='{$location['id']}'>{$location['address']}</option>";
                            }
                            ?>
                        </select>
                        <div>
                            <input id="direccion" type="text" placeholder="Direccion" name="direccion">
                            <input id="telefono" type="text" placeholder="Telefono" name="telefono" oninput="evaluarTelefono()">
                        </div>
                        <div class="type_payment">
                            <div>
                                <input value="online" name="type-payment" id="pago-completo" type="radio" checked>
                                <label for="pago-completo">Pago Online</label>
                            </div>
                            <div>
                                <input value="contraentrega" name="type-payment" id="pago-contraentrega" type="radio">
                                <label for="pago-contraentrega">Pago Contraentrega</label>
                            </div>
                        </div>
                        <div id="online" class="">
                            <div class="type_card">
                                <div>
                                    <input id="visa" type="radio" name="type_card" value="visa" checked />
                                    <label for="visa"><i class='bx bxl-visa'></i></label>
                                </div>
                                <div>
                                    <input id="paypal" type="radio" name="type_card" value="paypal" />
                                    <label for="paypal"> <i class='bx bxl-paypal'></i></label>
                                </div>
                            </div>
                            <div class="online_form">
                                <input id="nombre-titular" type="text" placeholder="Nombre del Titular">
                                <input id="numero-tarjeta" type="text" placeholder="Numero de Tarjeta" oninput="numeroTarjeta()">
                                <div>
                                    <input id="fecha" type="text" placeholder="Fecha Exp." oninput="fechaExp()">
                                    <input id="cvv" type="text" placeholder="CVV" oninput="numeroCvv()">
                                    
                                </div>
                            </div>
                        </div>
                        <div id="contraentrega" class="hidden">
                            <input id="monto-pagar" type="text" placeholder="Monto con el que pagara" name="amount_pay" oninput="evaluarMontoPagar()">
                        </div>
                        <div id="error" class="error"></div>
                        <div class="checkout">
                            <button id="regresarButton" type="button">Regresar<i class='bx bx-left-arrow-alt'></i></button> 
                            <button id="botonPagar" type="submit">Pagar<i class='bx bx-right-arrow-alt'></i></button>
                        </div>
                </form>
            </div>
            <div class="img_decoration"></div>
        </main>
        <script src="./js/crud_productos.js"></script>
        <script src="./js/pagos_formulario.js"></script>
    </body>
</html>