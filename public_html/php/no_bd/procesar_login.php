<?php

include '../verify_session.php';
include '../../util/letras.php';

//Traemos los datos del html
$user = limpiar_cadena($_POST['usuario']);
$pass = limpiar_cadena($_POST['contrasena']);

if ($user === "admin" && $pass === "2024") {
    $_SESSION['usuario'] = $user;
    header("Location: bienvenida_no_bd.php");
} else {
    header("Location: ../../login_signup.php?e=true");
}
?>