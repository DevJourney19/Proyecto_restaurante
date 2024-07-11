<?php
include_once 'php/util/validar_pago.php';
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
      <form action="">
        <div>
          <input id="direccion" type="text" placeholder="Direccion">
          <input id="telefono" type="text" placeholder="Telefono">
        </div>
        <div class="type_payment">
          <div>
            <input name="type-payment" id="pago-completo" type="radio" checked>
            <label for="pago-completo">Pago Online</label>
          </div>
          <div>
            <input name="type-payment" id="pago-contraentrega" type="radio">
            <label for="pago-contraentrega">Pago Contraentrega</label>
          </div>
        </div>
        <div id="online" class="">
          <div class="type_card">
            <div>
              <input id="visa" type="radio" name="type_card" checked />
              <label for="visa"><i class='bx bxl-visa'></i></label>
            </div>
            <div>
              <input id="paypal" type="radio" name="type_card" />
              <label for="paypal"> <i class='bx bxl-paypal'></i></label>
            </div>
          </div>
          <div class="online_form">
            <input id="nombre-titular" type="text" placeholder="Nombre del Titular">
            <input id="numero-tarjeta" type="text" placeholder="Numero de Tarjeta">
            <div>
              <input id="fecha" type="text" placeholder="Fecha Exp.">
              <input id="cvv" type="text" placeholder="CVV">
            </div>
          </div>
        </div>
        <div id="contraentrega" class="hidden">
          <input id="monto-pagar" type="text" placeholder="Monto con el que pagara">
        </div>
        <div  class="checkout">
          <button type="submit">Checkout<i class='bx bx-right-arrow-alt'></i></button>
        </div>
      </form>
    </div>
    <div class="img_decoration"></div>
  </main>
  <script src="./js/crud_productos.js"></script>
  <script src="./js/pagos_formulario.js"></script>
</body>

</html>