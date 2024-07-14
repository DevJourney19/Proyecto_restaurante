<?php
include './util/connection.php';

//Traemos los datos del html
$user = $_POST['usuario'];
$pass = $_POST['contrasena'];

$validar_login = "SELECT * FROM clients WHERE username = '$user' AND AES_DECRYPT(password, '$pass') = '$pass'";

try {
    conectar();
    $registro = consultar($validar_login);
    desconectar();
    if (count($registro) == 1) {
        session_start();
        $_SESSION['acceso'] = '12345';
        $_SESSION['email'] = $registro[0]['email'];
        header("Location: ../bienvenida.php");
    } else {
        session_start();
        session_destroy();
        header("Location: ../login_signup.php?e=true");
    }
} catch (Exception $exc) {
    die($exc->getMessage());
}