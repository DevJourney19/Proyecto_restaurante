<?php

// obtener los datos del formulario por su atributo name
$fullName = $_POST["full_name"];
$partners = $_POST["partners"];
$email = $_POST["email"];
$phoneNumber = $_POST["phone_number"];
$timeSelected = $_POST["time_selected"];
$daySelected = $_POST["day_selected"];
$message = $_POST["message"];

echo "Nombre completo: $fullName <br>";
echo "Número de acompañantes: $partners <br>";
echo "Correo electrónico: $email <br>";
echo "Número de teléfono: $phoneNumber <br>";
echo "Hora seleccionada: $timeSelected <br>";
echo "Día seleccionado: $daySelected <br>";
echo "Mensaje: $message <br>";

