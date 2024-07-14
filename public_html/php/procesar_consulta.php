<?php
session_start();
include_once './util/texto.php';
include 'util/connection.php';
$client_id = $_SESSION['id'];
// Obtener la URL completa para verificar que no supere el límite de 1024 caracteres
$urlCompleta = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
if (strlen($urlCompleta) > 1024) {
    echo "<script>
        alert('Error: La URL supera el límite de 1024 caracteres. Te redirigiremos a la página de reservaciones.');
        window.location.href = '../reservations.php';
      </script>";
    exit;
}

// obtener los datos del formulario por su atributo name
$fullName = $_GET["full_name"];
$consultType = $_GET["consulta"];
$email = $_GET["email"];
$phoneNumber = $_GET["phone_number"];
$location = NULL;
$partners = "";
$fechaSQL = "";
$timeSQL = "";

$message = $_GET["message"];
if ($consultType != "mensaje") {
    $location = $_GET["location"];
    $partners = $_GET["partners"];
    $timeSelected = $_GET["time_selected"];
    $daySelected = $_GET["day_selected"];
    $day = new DateTime($daySelected);
    $fechaSQL = $day->format('Y-m-d');
    $time = new DateTime($timeSelected);
    $timeSQL = $time->format('H:i:s');
}

$fullNameProcessed = mayusculaFirstWord(minusculas(limpiarHtml(limpiarEspacios($fullName))));
$emailProcessed = minusculas(limpiarHtml(limpiarEspacios($email)));
$phoneNumberProcessed = evaluarTelefono(limpiarHtml(limpiarEspacios($phoneNumber)));
$messageProcessed = mayusculaFirst(limpiarHtml(limpiarEspacios($message)));

unset($fullName);
unset($email);
unset($phoneNumber);
unset($message);

$sql = "INSERT INTO `reservation` (`fullname`,`client_id`,`consult_type`, `email`, `phone_number`, `companions`, `date`, `time`, `message`, `location_id`) VALUES ('$fullNameProcessed','$client_id','$consultType','$emailProcessed','$phoneNumberProcessed','$partners','$fechaSQL','$timeSQL','$messageProcessed',";
$sql .= is_null($location) ? "NULL" : "'$location'";
$sql .= ")";
try {
    conectar();
    if (ejecutar($sql)) {
        echo "<script>
        window.location.href = '../reservations.php';
        alert('Reservación realizada con éxito');
      </script>";
    } else {
        echo "<script>
        window.location.href = '../reservations.php';
        alert('Error al realizar la reservación');
        </script>";
    }
} catch (Exception $exc) {
    die($exc->getMessage());
}
?>