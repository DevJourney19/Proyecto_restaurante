<?php
include_once './util/texto.php';
// obtener los datos del formulario por su atributo name

$fullName = $_GET["full_name"];
$consultType = $_GET["consulta"];
$email = $_GET["email"];
$phoneNumber = $_GET["phone_number"];

if ($consultType == "mensaje") {
  $message = $_GET["message"];
} else {
  $location = $_GET["location"];
  $partners = $_GET["partners"];
  $timeSelected = $_GET["time_selected"];
  $daySelected = $_GET["day_selected"];
}
?>

<div>
  <h2>Tabla resumen</h2>
  <table class="table">
    <tbody>
      <tr>
        <th>Nombres</th>
        <td>
          <pre><?= mayusculaFirstWord(limpiarEspacios(limpiarHtml($fullName))) ?></pre>
        </td>
      </tr>
      <tr>
        <th>Correo</th>
        <td><?= minusculas(limpiarEspacios(limpiarHtml($email))) ?></td>
      </tr>
      <tr>
        <th>Número de Celular</th>
        <td><?= evaluarTelefono(limpiarEspacios(limpiarHtml($phoneNumber))) ?></td>
      </tr>
      <tr>
        <th>Tipo Consulta</th>
        <td><?= mayusculaFirst($consultType) ?></td>
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
          <td><?= mayusculaFirst(limpiarEspacios(limpiarHtml($message)))?></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>