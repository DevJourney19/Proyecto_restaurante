<?php

// obtener los datos del formulario por su atributo name



$fullName = $_GET["full_name"];
$partners = $_GET["partners"];
$email = $_GET["email"];
$phoneNumber = $_GET["phone_number"];
$timeSelected = $_GET["time_selected"];
$daySelected = $_GET["day_selected"];
$message = $_GET["message"];
?>

<div>
  <table>
    <tr>
      <td>Nombre completo:</td>
      <td><?php echo $fullName; ?></td>
    </tr>
    <tr>
      <td>Tipo de Consulta:</td>
      <td><?php echo $partners; ?></td>
    </tr>
    <tr>
      <td>Compañeros:</td>
      <td><?php echo $partners; ?></td>
    </tr>
    <tr>
      <td>Correo electrónico:</td>
      <td><?php echo $email; ?></td>
    </tr>
    <tr>
      <td>Número de teléfono:</td>
      <td><?php echo $phoneNumber; ?></td>
    </tr>
    <tr>
      <td>Hora seleccionada:</td>
      <td><?php echo $timeSelected; ?></td>
    </tr>
    <tr>
      <td>Día seleccionado:</td>
      <td><?php echo $daySelected; ?></td>
    </tr>
    <tr>
      <td>Mensaje:</td>
      <td><?php echo $message; ?></td>
    </tr>
  </table>
</div>
