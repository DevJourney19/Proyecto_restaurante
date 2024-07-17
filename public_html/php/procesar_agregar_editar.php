<?php

include './util/validar_entradas.php';
include 'util/connection.php';
include_once './util/texto.php';

validar_entrada("../reservations.php");
//El id del usuario que fue registrado
$client_id = $_SESSION['id'];
//El id de la reservacion :)
$id_reservacion = $_GET['id'];

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

//va a leer la consulta que recien se ha enviado en la url o donde parte, no con una ya puesta
//SI SE HIZO CLIC EN EDITAR PEDIDO

if ($id_reservacion != "") {
    echo "ACTUALIZAR";
    echo $id_reservacion;
    $sql = "UPDATE `reservation` set "
            . "`fullname`='$fullNameProcessed', `consult_type`='$consultType', "
            . "`email`='$emailProcessed', "
            . "`phone_number`= " . (is_null($phoneNumberProcessed) ? "NULL" : "'$phoneNumberProcessed'") . ", "
            . "`companions`= " . (is_null($partners) ? "NULL" : "'$partners'") . ", "
            . "`date`=" . (is_null($fechaSQL) ? "NULL" : "'$fechaSQL'") . ", "
            . "`time`=" . (is_null($timeSQL) ? "NULL" : "'$timeSQL'") . ", "
            . "`message`= '$messageProcessed', "
            . "`location_id`=" . (is_null($location) ? "NULL" : "'$location'") . " "
            . "where `id`=$id_reservacion";
} else {
    echo "INSERTAR";
    $sql = "INSERT INTO `reservation` (`fullname`,`client_id`,`consult_type`, "
            . "`email`, `phone_number`, `companions`, `date`, `time`, `message`, "
            . "`location_id`) VALUES ('$fullNameProcessed','$client_id',"
            . "'$consultType','$emailProcessed', "
            . (is_null($phoneNumberProcessed) ? "NULL" : "'$phoneNumberProcessed'") . ", "
            . (is_null($partners) ? "NULL" : "'$partners'") . ", "
            . (is_null($fechaSQL) ? "NULL" : "'$fechaSQL'") . ", "
            . (is_null($timeSQL) ? "NULL" : "'$timeSQL'") . ", "
            . "'$messageProcessed', "
            . (is_null($location) ? "NULL" : "'$location'") . ")";
}
try {
    conectar();
    if (ejecutar($sql)) {
        echo "<script>
        window.location.href = '../reservations.php';
        alert('Operación realizada con éxito');
      </script>";
    } else {
        echo "<script>
        window.location.href = '../reservations.php';
        alert('Error en la reservación');
        </script>";
    }
//    var_dump($_GET["id"]);
} catch (Exception $exc) {
    die($exc->getMessage());
}
