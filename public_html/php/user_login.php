<?php

session_start();
include './util/connection.php';

//Traemos los datos del html
$user = $_POST['usuario'];
$pass = $_POST['contrasena'];
//!!BUSCAR LA MANERA PARA CAMBIAR DE HASH TIPO SHA512 A AESCRIPT, CLAVE CLAVE ---------------------------------------!!!
//$pass = hash('sha512', $pass);

$validar_login = "SELECT * FROM clients WHERE username = '$user' AND 'AES_DECRYPT(password, '$pass') = '$pass'";

try {
    conectar();
    $registro = consultar($validar_login);
    desconectar();
    if (count($registro) == 1) {
        session_start();
        $_SESSION['acceso'] = '12345';
        $_SESSION['usuario'] = $user;
        header("Location: ../bienvenida.php");
    } else {
        session_start();
        session_destroy();
        header("Location: ../login_signup.php?e=true");
    }
} catch (Exception $exc) {
    die($exc->getMessage());
}