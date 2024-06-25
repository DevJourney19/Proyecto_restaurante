<?php
include_once './util/texto.php';
// obtener los datos del formulario por su atributo name

$fullName = $_GET["full_name"];
$consultType = $_GET["consulta"];
$email = $_GET["email"];
$phoneNumber = $_GET["phone_number"];

// Obtener la URL completa
$urlCompleta = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
if (strlen($urlCompleta) > 1024) {
    die("$urlCompleta </br> Error: La URL supera el límite de 1024 caracteres.");
}

if ($consultType == "mensaje") {
  $message = $_GET["message"];
} else {
  $location = $_GET["location"];
  $partners = $_GET["partners"];
  $timeSelected = $_GET["time_selected"];
  $daySelected = $_GET["day_selected"];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/general.css" />
  <link rel="stylesheet" href="../css/table.css" />
  <title>Tabla Resumen Contactanos</title>
</head>

<body>
  <div class="container_table">
    <h2>Tabla resumen</h2>
    <table class="table">
      <tbody>
        <tr>
          <th>Nombres</th>
          <td>
            <?= mayusculaFirstWord(minusculas(limpiarHtml(limpiarEspacios($fullName)))) ?>
          </td>
        </tr>
        <tr>
          <th>Correo</th>
          <td><?= minusculas(limpiarHtml(limpiarEspacios($email))) ?></td>
        </tr>
        <tr>
          <th>Número de Celular</th>
          <td><?= evaluarTelefono(limpiarHtml(limpiarEspacios($phoneNumber))) ?></td>
        </tr>
        <tr>
          <th>Tipo Consulta</th>
          <td><?= mayusculaFirst(minusculas($consultType)) ?></td>
        </tr>
        <?php if ($consultType == "reservacion") : ?>
          <tr>
            <th>Locacion</th>
            <td><?= $location ?></td>
          </tr>
          <tr>
            <th>Acompañantes</th>
            <td><?= $partners ?></td>
          </tr>
          <tr>
            <th>Dia y Hora</th>
            <td><?= $daySelected ?> a las <?= $timeSelected ?></td>
          </tr>
        <?php endif; ?>
        <?php if ($consultType == "mensaje") : ?>
          <tr>
            <th>Mensaje</th>
            <td><?= mayusculaFirst(limpiarHtml(limpiarEspacios($message))) ?></td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>

</html>